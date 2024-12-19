<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsCategory;
use App\Models\Url;
use App\Traits\HandleFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    use HandleFile;
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request, $limit = 10)
    {
        $input = $request->all();
        $query = Category::where('id', '>=', 0);
        $selected = '';
        if ($request->get('root_id')) {
            $selected = $request->get('root_id');
            $query = $query->where('parent_id', $request->get('root_id'));
        }
        if ($request->get('name')) {
            $query = $query->where('title', 'like', '%' . $request->get('name') . '%');
        }
        if ($request->get('ordering')) {
            $query = $query->orderBy('ordering', $request->get('ordering'));
        } else {
            $query = $query->orderBy('ordering', "ASC");
        }
        $data = $query->paginate($limit);
        $categoryParent = Category::where('id', '>=', 0)->where('parent_id', '')->orWhere('parent_id', null)->get();
        $category_html = \App\Helper\StringHelper::getSelectOption($categoryParent, $selected);

        return view('admin.category.index', compact('data', 'request', 'input', 'category_html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categoryParent = Category::where('id', '>=', 0)->where('parent_id', '')->orWhere('parent_id', null)->get();
        $category_html = \App\Helper\StringHelper::getSelectOption($categoryParent);
        $parentCount = Category::where('id','>', 0)->where('parent_id', '')->orWhere('parent_id', null)->count();

        return view('admin.category.create', compact('category_html', 'parentCount'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $thumbnailName = public_path('/images/verification-img.png');

        if ($request->has('thumbnail')) {
            $response = $this->uploadAndConvertImage($request->file('thumbnail'), '/images/categories');
            $thumbnailName = $response->getData()->path;
        }
        $input['avatar'] = $thumbnailName;

        try {
            $url['module'] = 'Category';
            $url['alias'] = $input['alias'];
            Url::create($url);

            Category::create($input);
            return redirect()->route('admin.categories.index')->with('success','Thêm mới thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.categories.index')->with('error','Thêm mới không thành công');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if (isset($category)) {
            $categoryParent = Category::where('id', '>=', 0)->where('parent_id', '')->orWhere('parent_id', null)->where('id', '<>', $category->id)->get();

            $category_html = \App\Helper\StringHelper::getSelectOption($categoryParent, $category->parent_id);
            return view('admin.category.create', compact('category', 'category_html'));

        } else {
            return redirect()->route('admin.categories.index')->with('error','Tin tức không tồn tại');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if ($category) {
            try {
                $input = $request->all();
                if ($request->has('thumbnail')) {
                    $this->deleteFile($category->avatar);
                    $thumbnail = $request->file('thumbnail');
                    $responsiveAvatar = $this->uploadAndConvertImage($thumbnail, '/images/categories');
                    $input['avatar'] = $responsiveAvatar->getData()->path;
                }
                if($category->alias != $input['alias']){
                    Url::where('alias',$category->alias)->update(['alias'=>$input['alias']]);
                }
                $category->update($input);

                return redirect()->route('admin.categories.index')->with('success','Cập nhật thành công');
            } catch (\Exception $e) {
                return redirect()->route('admin.categories.index')->with('error','Cập nhật không thành công');
            }

        }

        return redirect()->route('admin.categories.index')->with('error','Danh mục sản phẩm không tồn tại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (isset($category)) {
            DB::beginTransaction();
            try {
                $input['parent_id'] = null;
                $category->child->each->update($input);
                $category->products()->sync([]);

                $this->deleteFile($category->avatar);
                $category->delete();

                DB::commit();

                return redirect()->route('admin.categories.index')->with('success','Xoá danh mục sản phẩm thành công');
            } catch(\Exception $exception) {
                DB::rollBack();

                return redirect()->route('admin.categories.index')->with('error','Xoá danh mục sản phẩm không thành công');
            }
        } else {
            return redirect()->route('admin.categories.index')->with('error','Danh mục sản phẩm không tồn tại');
        }
    }
    public function categoryRoot(Request $request) {
        $input = $request->all();
        $query = Category::where('id', '>=', 0)->where('parent_id', '=', null)->orWhere('parent_id', '=', '');
        if ($request->get('name')) {
            $query = $query->where('title', 'like', '%' . $request->get('name') . '%');
        }
        $data = $query->orderBy('ordering', "ASC")->paginate(20);

        return view('admin.category.category-root', compact('data', 'request', 'input'));
    }

}
