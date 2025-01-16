<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use App\Models\Tags;
use App\Models\TourPlan;
use App\Models\Url;
use Faker\Core\Color;
use \Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Traits\HandleFile;
use function GuzzleHttp\Promise\all;

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
        if ($request->get('ordering')) {
            $query = $query->orderBy('ordering', $request->get('ordering'));
        } else {
            $query = $query->orderBy('ordering', "ASC");
        }
        $data = $query->paginate($limit)->withQueryString();

        return view('admin.product.index', compact('data', 'input'));
    }
    public function create() {
        $amenitiesAll = Amenity::where('id', '>=', 0)->select('id', 'name as text')->get()->toArray();

        $rowCounter = 0;
        $isCreate = true;
        return view('admin.product.create', compact(['rowCounter', 'isCreate', 'amenitiesAll']));
    }
    public function store(Request $request) {
        $input = $request->all();
        $images = '';
        if (isset($input['gallery'])) {
            $images = implode(',', $input['gallery']);
        }

        $tags = [];
        if (isset($input['tags'])) {
            $tags = $this->conventTag($input['tags']);
        }
        DB::beginTransaction();
        try {
            $inputProduct = $request->only(['name', 'alias', 'map_google_address', 'description', 'content', 'meta_title', 'meta_description', 'meta_key_word']);
            $inputProduct['images'] = $images;
            $product = Product::create($inputProduct);
            if (isset($input['tags'])) {
                $product->tags()->sync($tags);
            }
            if (isset($input['amenity_ids'])) {
                $product->amenities()->sync($input['amenity_ids']);
            }

            $url['module'] = 'Product';
            $url['alias'] = $input['alias'];
            Url::create($url);
            foreach ($input['plans'] as $plan) {
                // Tạo đối tượng ProductColor mới
                $planModel = new TourPlan();
                $planModel->product_id = $product->id;
                $planModel->name = $plan['name'];
                $planModel->content = $plan['content'];
                // Lưu vào database
                $planModel->save();
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with('success','Thêm mới sản phẩm thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.products.index')->with('error','Thêm mới sản phẩm không thành công');
        }
    }

    public function edit($id) {
        $product = Product::find($id);
        $rowCounter = count($product->tourPlans);
        if (isset($product)) {
            $amenitiesAll = Amenity::where('id', '>=', 0)->select('id', 'name as text')->get()->toArray();
            foreach ($product->amenities as $amenity) {
                $find = array_search($amenity->id, array_column($amenitiesAll, 'id'));

                if ($find >= 0) {
                    $amenitiesAll[$find]['selected'] = true;
                }
            }

            $isCreate = false;
            return view('admin.product.create', compact('amenitiesAll', 'product', 'rowCounter', 'isCreate'));
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
        if (isset($input['tags'])) {
            $input['tags'] = $this->conventTag($input['tags']);
        } else {
            $input['tags'] = [];
        }
        if ($product) {
            DB::beginTransaction();
            try {
                if($product->alias != $input['alias']){
                    Url::where('alias',$product->alias)->update(['alias'=>$input['alias']]);
                }
                if (isset($input['gallery'])) {
                    $images = implode(',', $input['gallery']);
                    $input['images'] = $images;
                }
                $product->update($input);
                if (isset($input['amenity_ids']) && is_array($input['amenity_ids'])) {
                    $product->amenities()->sync($input['amenity_ids']);
                } else {
                    $product->amenities()->detach();
                }
                $product->tags()->sync($input['tags']);

                if (isset($input['plans'])) {
                    foreach ($input['plans'] as $plan) {
                        if (isset($plan['id']) && $plan['id']) {
                            $tourPlan = TourPlan::find($plan['id']);
                            if ($tourPlan) {
                                $tourPlan->name = $plan['name'] ?? $tourPlan->name;
                                $tourPlan->content = $plan['content'] ?? $tourPlan->content;

                                $tourPlan->save();
                            }
                        } else {
                            $tourPlan = new TourPlan();

                            $tourPlan->product_id = $product->id;
                            $tourPlan->name = $plan['name'];
                            $tourPlan->content = $plan['content'];

                            $tourPlan->save();
                        }
                    }
                }

                if (isset($input['deleted_product_plan_id']) && $input['deleted_product_plan_id']) {
                    $tourPlanIds = explode(',', $input['deleted_product_plan_id']);

                    foreach ($tourPlanIds as $planId) {
                        $plan_delete = TourPlan::find($planId);
                        if ($plan_delete) {
                            $plan_delete->delete();
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
                $product->amenities()->sync([]);
                $product->tags()->sync([]);
                foreach ($product->tourPlans as $plan) {
                    $plan->delete();
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
