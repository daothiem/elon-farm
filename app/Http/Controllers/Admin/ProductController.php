<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use App\Models\Tags;
use App\Models\Url;
use Faker\Core\Color;
use \Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Traits\HandleFile;
class ProductController extends Controller
{
    use HandleFile;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $limit = 10) {
        $input = $request->all();
        $query = Product::where('id', '>=', 0);
        if ($request->get('name')) {
            $query = $query->where('name', 'like', '%' . $request->get('name') . '%');
        }
        $selected = '';
        if ($request->get('root_id')) {
            $cateIds = [];
            $parentCate = Category::find($request->get('root_id'));
            if ($parentCate) {
                foreach ($parentCate->child as $cate) {
                    $cateIds[] = $cate->id;
                }
            }
            $productCate = ProductCategory::whereIn('category_id', $cateIds)->get()->toArray();
            $proId = array_map(function ($item) {
                return $item['product_id'];
            }, $productCate);

            $selected = $request->get('root_id');
            $query = $query->whereIn('id', $proId);
        }
        $selectedCate = '';
        if ($request->get('cate_id')) {
            $selectedCate = $request->get('cate_id');
            $category = Category::find($selectedCate);
            $proIds = [];
            if ($category) {
                $productCategory = $category->products()->get()->toArray();
                $proIds = array_map(function ($item) {
                    return $item['id'];
                }, $productCategory);
            }
            if (count($proIds)) {
                $query = $query->whereIn('id', $proIds);
            }
        }
        if ($request->get('ordering')) {
            $query = $query->orderBy('ordering', $request->get('ordering'));
        } else {
            $query = $query->orderBy('ordering', "ASC");
        }
        $data = $query->paginate($limit)->withQueryString();
        $categoryParent = Category::where('id', '>=', 0)->where('parent_id', '')->orWhere('parent_id', null)->get();
        $categoryParentHtml = \App\Helper\StringHelper::getSelectOption($categoryParent, $selected);
        $categories = Category::where('id', '>=', 0)->where('parent_id', '<>', '')->where('parent_id', '<>', null)->get();
        $categoriesHtml = \App\Helper\StringHelper::getSelectOption($categories, $selectedCate);

        return view('admin.product.index', compact('data', 'input', 'categoryParentHtml', 'categoriesHtml'));
    }

    function getParentCategory() {
        return Category::where('parent_id', '')->orWhere('parent_id', null)->get();
    }
    public function create() {
        $categories = $this->getParentCategory();
        $category_html = \App\Helper\StringHelper::getSelectOption($categories, '', 'Vui lòng chọn', false, false);

        $rowCounter = 0;
        return view('admin.product.create', compact(['category_html', 'rowCounter']));
    }
    public function store(Request $request) {
        $input = $request->all();
        $thumbnailPath = '';
        if ($request->has('thumbnail')) {
            $response = $this->uploadAndConvertImage($request->file('thumbnail'), '/images/products');
            $thumbnailPath = $response->getData()->path;
        }
        $input['avatar'] = $thumbnailPath;
        $input['ordering'] = $input['ordering'] ?? 100;
        $input['images'] = '';
        $input['is_hot'] = (isset($input['is_hot']) && $input['is_hot']  === 'on') ? 1 : 0;
        $tags = [];
        if (isset($input['tags'])) {
            $tags = $this->conventTag($input['tags']);
        }
        DB::beginTransaction();
        /*try {*/
            $product = Product::create($input);
            if (isset($input['category_id'])) {
                $product->categories()->sync($input['category_id']);
            }
            if (isset($input['tags'])) {
                $product->tags()->sync($tags);
            }

            $url['module'] = 'Product';
            $url['alias'] = $input['alias'];
            Url::create($url);
            foreach ($input['colors'] as $color) {
                // Gọi hàm upload và chuyển đổi ảnh
                $response = $this->uploadAndConvertImage($color['image'], '/images/products');
                // Kiểm tra response
                if (!$response->getData()->success) {
                    throw new \Exception($response->getData()->message ?? 'Image upload failed.');
                }

                // Tạo đối tượng ProductColor mới
                $colorModel = new ProductColor();
                $colorModel->product_id = $product->id;
                $colorModel->name = $color['name'];
                $colorModel->price = $color['price'];
                $colorModel->price_discount = $color['price_discount'];
                $colorModel->image = $response->getData()->path;

                // Lưu vào database
                $colorModel->save();
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with('success','Thêm mới sản phẩm thành công');
        /*} catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.products.index')->with('error','Thêm mới sản phẩm không thành công');
        }*/
    }

    public function edit($id) {
        $product = Product::find($id);
        $rowCounter = count($product->colors);
        if (isset($product)) {
            $categories = Category::all();
            $categoriesTemp = $product->categories()->select('categories.id as category_id')->get()->toArray();
            $categoriesSelected = [];
            foreach ($categoriesTemp as $categoryId) {
                $categoriesSelected[] = $categoryId['category_id'];
            }
            $category_html = \App\Helper\StringHelper::getSelectOption($categories,$categoriesSelected , 'Vui lòng chọn', false, false);

            return view('admin.product.create', compact('category_html', 'product', 'rowCounter'));
        } else {
            return redirect()->route('admin.products.index')->with('error','Sản phẩm không tồn tại');
        }
    }

    function conventTag ($tags): array
    {
        $temp = [];
        foreach ($tags as $tag) {
            if (is_numeric($tag)) {
                $temp[] = (integer)$tag;
            } else {
                $findTag = Tags::where('name', $tag)->first();
                if ($findTag) {
                    $temp[] = $findTag->id;
                }
            }
        }

        return $temp;
    }
    public function update(Request $request, $id) {
        $product = Product::find($id);
        $input = $request->all();
        if ($input['tags']) {
            $input['tags'] = $this->conventTag($input['tags']);
        }
        if ($product) {
            $input['avatar'] = $product->avatar;
            if ($request->has('thumbnail')) {
                $this->deleteFile($product->avatar);
                $thumbnail = $request->file('thumbnail');
                $responsiveAvatar = $this->uploadAndConvertImage($thumbnail, '/images/products');
                $input['avatar'] = $responsiveAvatar->getData()->path;
            }
            $input['is_hot'] = (isset($input['is_hot']) && $input['is_hot']  === 'on') ? 1 : 0;

            DB::beginTransaction();
            try {
                if($product->alias != $input['alias']){
                    Url::where('alias',$product->alias)->update(['alias'=>$input['alias']]);
                }
                //dd($input['tags'],$input['category_id']);
                $product->update($input);
                $product->categories()->sync($input['category_id']);
                $product->tags()->sync($input['tags']);
                if ($input['colors']) {
                    foreach ($input['colors'] as $colorInput) {
                        if (isset($colorInput['id']) && $colorInput['id']) {
                            $color = ProductColor::find($colorInput['id']);
                            if ($color) {
                                $color->name = $colorInput['name'] ?? $color->name;
                                $color->price = $colorInput['price'] ?? $color->price;
                                $color->price_discount = $colorInput['price_discount'] ?? $color->price_discount;

                                if (isset($colorInput['image']) && $colorInput['image'] instanceof UploadedFile) {
                                    $this->deleteFile($color->image);
                                    $response_color = $this->uploadAndConvertImage($colorInput['image'], '/images/products');
                                    $color->image = $response_color->getData()->path;
                                }
                                $color->save();
                            }
                        } else {
                            $color = new ProductColor();

                            $color->product_id = $product->id;
                            $color->name = $colorInput['name'];
                            $color->price = $colorInput['price'];
                            $color->price_discount = $colorInput['price_discount'];
                            if (isset($colorInput['image']) && $colorInput['image'] instanceof UploadedFile) {
                                $response_color = $this->uploadAndConvertImage($colorInput['image'], '/images/products');
                                $color->image = $response_color->getData()->path;
                            }

                            $color->save();
                        }
                    }
                }

                if (isset($input['deleted_product_color_id']) && $input['deleted_product_color_id']) {
                    $colorIds = explode(',', $input['deleted_product_color_id']);

                    foreach ($colorIds as $colorId) {
                        $color_delete = ProductColor::find($colorId);
                        if ($color_delete) {
                            $this->deleteFile($color_delete->image);
                            $color_delete->delete();
                        }
                    }
                }

                DB::commit();
                return redirect()->route('admin.products.index')->with('success','Cập nhật sản phẩm thành công');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('admin.products.index')->with('error','Cập nhật sản phẩn không thành công');
            }
        } else {
            return redirect()->route('admin.products.index')->with('error','Sản phẩm không tồn tại');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            DB::beginTransaction();
            try {
                Url::where('alias',$product->alias)->delete();
                $product->categories()->sync([]);
                $product->tags()->sync([]);
                foreach ($product->colors as $color) {
                    $this->deleteFile($color->image);
                    $color->delete();
                }
                $product->delete();

                DB::commit();

                return redirect()->route('admin.products.index')->with('success','Xoá sản phẩm thành công');
            } catch (\Exception $e) {
                DB::rollBack();

                return redirect()->route('admin.products.index')->with('error','Xoá sản phẩn không thành công');
            }

        } else {
            return redirect()->route('admin.products.index')->with('error','Sản phẩm không tồn tại');
        }
    }
}
