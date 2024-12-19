<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use App\Models\Url;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class NewsCategoryController extends Controller
{
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
        $query = NewsCategory::where('id', '>=', 0);
        if ($request->get('name')) {
            $query = $query->where('title', 'like', '%' . $request->get('name') . '%');
        }
        if ($request->get('ordering')) {
            $query = $query->orderBy('ordering', $request->get('ordering'));
        } else {
            $query = $query->orderBy('ordering', "ASC");
        }
        $data = $query->paginate($limit);

        return view('admin.newsCategory.index', compact('data', 'input'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $parentArray = NewsCategory::where('id', '>=', 1)->select('id', 'title')->get()->toArray();

        return view('admin.newsCategory.create', compact('parentArray'));
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
        $input['created_by'] = auth()->user()->id;
        $input['description'] = trim($input['description'], '');
        $url['module'] = 'NewsCategory';
        $url['alias'] = $input['alias'];
        Url::create($url);
        try {
            NewsCategory::create($input);

            $url['module'] = 'NewsCategory';
            $url['alias'] = $input['alias'];
            Url::create($url);
            return redirect()->route('admin.newsCategory.index')->with('success','Thêm mới thành công');
        } catch (\e) {
            return redirect()->route('admin.newsCategory.index')->with('success','Thêm mới không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $parentArray = NewsCategory::where('id', '>=', 1)->where('id', '<>', $id)->select('id', 'title')->get()->toArray();
        $newsCategory =  NewsCategory::where('id', '=', $id)->first();

        return view('admin.newsCategory.create', compact('newsCategory', 'parentArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $newsCategory = NewsCategory::find($id);

        $input['description'] = trim($input['description'], '');
        try {
            if ($newsCategory) {
                $newsCategory->update($input);

                return redirect()->route('admin.newsCategory.index')->with('success','Chỉnh sửa thành công');
            } else {
                return redirect()->route('admin.newsCategory.index')->with('error','Danh mục tin tức không tồn tại');
            }
        } catch (e) {
            return redirect()->route('admin.newsCategory.index')->with('error','Danh mục tin tức không thành công');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        try {
            $newsCategory = NewsCategory::find($id);
            if ($newsCategory) {
                Url::where('alias', $newsCategory->alias)->delete();
                $newsCategory->delete();

                return redirect()->route('admin.newsCategory.index')->with('success','Xoá thành công');
            } else {
                return redirect()->route('admin.newsCategory.index')->with('error','Danh mục tin tức không tồn tại');
            }
        } catch (e) {
            return redirect()->route('admin.newsCategory.index')->with('error','Xoá danh mục tin tức không thành công');
        }

    }
}
