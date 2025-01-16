<?php

namespace App\Http\Controllers\Admin;

use App\Helper\StringHelper;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Product;
use App\Models\TagNews;
use App\Models\Tags;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class NewsController extends Controller
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
        $query = News::where('id', '>=', 0);
        $selectedCate = $request->get('cate_id');
        if ($request->get('name')) {
            $query = $query->where('title', 'like', '%' . $request->get('name') . '%');
        }
        if ($selectedCate) {
            $newCate = NewsCategory::find($selectedCate);
            $newsIds = [];
            if ($newCate) {
                $newsCategory = $newCate->news()->get()->toArray();
                $newsIds = array_map(function ($item) {
                    return $item['id'];
                }, $newsCategory);
            }
            if (count($newsIds)) {
                $query = $query->whereIn('id', $newsIds);
            }
        }
        if ($request->get('ordering')) {
            $query = $query->orderBy('ordering', $request->get('ordering'));
        } else {
            $query = $query->orderBy('ordering', "ASC");
        }
        $data = $query->paginate($limit);
        $newCategories = NewsCategory::all();
        $categoriesHtml = StringHelper::getSelectOption($newCategories, $selectedCate);

        return view('admin.news.index', compact('data', 'input', 'categoriesHtml'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $news_category = NewsCategory::all();
        $news_category_html = \App\Helper\StringHelper::getSelectOption($news_category);

        return view('admin.news.create', compact('news_category_html'));
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
        $thumbnailPath = public_path('/images/news');
        $thumbnailName = 'verification-img.png';

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($thumbnailPath, $thumbnailName);
        }

        $input['avatar'] = '/images/news/' . $thumbnailName;
        $input['is_hot'] = $request->boolean('is_hot', false);
        $input['tags'] = $request->filled('tags') ? $this->conventTag($input['tags']) : [];

        DB::beginTransaction();
        try {
            $news = News::create($input);

            $news->tags()->sync($input['tags']);

            Url::create([
                'module' => 'News',
                'alias' => $input['alias']
            ]);

            DB::commit();
            return redirect()->route('admin.news.index')->with('success', 'Thêm mới thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.news.index')->with('error', 'Thêm mới không thành công');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $news = News::find($id);
        if (isset($news)) {
            $news_category = NewsCategory::all();
            $news_category_html = \App\Helper\StringHelper::getSelectOption($news_category, $news->category_id);
            return view('admin.news.create', compact('news', 'news_category_html'));

        } else {
            return redirect()->route('admin.news.index')->with('error','Tin tức không tồn tại');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);
        if (!$news) {
            return redirect()->route('admin.news.index')->with('error', 'Tin tức không tồn tại');
        }

        $input = $request->all();
        $thumbnailPath = public_path('/images/news');
        $thumbnailName = basename($news->avatar);
        $input['is_hot'] = $request->boolean('is_hot', false);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($thumbnailPath, $thumbnailName);
        }
        $input['avatar'] = '/images/news/' . $thumbnailName;
        $input['tags'] = $request->filled('tags') ? $this->conventTag($input['tags']) : [];

        DB::beginTransaction();

        try {
            if ($news->alias !== $input['alias']) {
                Url::where('alias', $news->alias)->update(['alias' => $input['alias']]);
            }

            $news->update($input);
            $news->tags()->sync($input['tags']);

            DB::commit();
            return redirect()->route('admin.news.index')->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.news.index')->with('error', 'Cập nhật không thành công');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $news = News::find($id);

        if ($news) {
            DB::beginTransaction();
            try {
                $news->middleTags->each->delete();
                $news->delete();

                DB::commit();
                return redirect()->route('admin.news.index')->with('success','Xoá thành công');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('admin.news.index')->with('error','Xoá không thành công');
            }
        } else {
            return redirect()->route('admin.news.index')->with('error','Tin tức không tồn tại');
        }
    }
}
