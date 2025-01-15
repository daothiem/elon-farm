<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Poster;
use App\Models\Product;
use App\Models\Province;
use App\Models\Staff;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FrontendController extends Controller
{
    public function siteMap() {
        $products = Product::all();
        $news = News::all();

        $data = [];
        $index = 0;
        foreach ($products as $product) {
            $data[$index]['alias'] = $product->alias;
            $data[$index]['created_at'] = $product->created_at;
            $index ++;
        }
        foreach ($news as $new) {
            $data[$index]['alias'] = $new->alias;
            $data[$index]['created_at'] = $new->created_at;
            $index ++;
        }

        return response()->view('frontend.siteMap.index', compact(['data']))->header('Content-Type', 'text/xml');
    }

    public function aboutUs(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('frontend.about_us');
    }

    public function listNews(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $news = News::where('id', '>=', 0)->orderBy('ordering', "ASC")->paginate(5)->withQueryString();
        return view('frontend.news.list', compact('news'));
    }

    public function contact() {
        return view('frontend.contact');
    }
    function filterVideo($string) {
        $array = explode(",", $string);

        $result = array();
        $imageExtensions = array("png", "jpg", "jpeg", "gif");
        $videoExtensions = array("mp4", "avi", "mov", "wmv");
        $result['images'] = [];
        $result['videos'] = [];
        foreach ($array as $item) {
            $extension = pathinfo($item, PATHINFO_EXTENSION);
            if (in_array($extension, $imageExtensions)) {
                $result['images'][] = $item;
            } else if (in_array($extension, $videoExtensions)) {
                $result['videos'][] = $item;
            }
        }

        return $result;
    }
    public function repairService() {
        return view('frontend.repair_service.index');
    }

    public function view($alias) {
        $model = Url::where('alias',$alias)->first();
        if ($model === null) {
            return view('frontend.404');
        }
        $dataSeo = [];
        
        $model_name = $model->module;
        $view = 'frontend.'.strtolower($model_name).'.index';
        $model = '\\App\Models\\'.ucfirst($model_name);
        $data = $model::where('alias',$alias)->first();
        if ($model_name === 'Product') {
            $data['staffs'] = Staff::where('id', '>', 0)->orderBy('ordering', "ASC")->get();
            $data['category'] = $data->categories[0];
            foreach ($data['category']->products as $product) {
                $all_image = $this->filterVideo($product->images);
                $product['allImage'] = $all_image['images'];
            }
            $data['imageVideo'] = $this->filterVideo($data->images);
        }
        if ($model_name === 'Category') {
            $data['current_alias'] = $alias;
            $data['posters'] = Poster::where('is_show', true)->orderBy('ordering', 'ASC')->take(4)->get();
        }
        if ($model_name === 'News' || $model_name === 'NewsCategory') {
            $data['new_categories'] = NewsCategory::where('id', '>', 0)->whereNotNull('parent_id')->orderBy('ordering', 'ASC')->take(5)->get();
        }
        if ($model_name === 'NewsCategory') {
            if (is_null($data->parent_id)) {
                $data['news'] = News::select('news.*')
                    ->joinSub(
                        News::select('category_id', DB::raw('MAX(id) as max_id'))
                            ->groupBy('category_id'),
                        'latest_news',
                        function ($join) {
                            $join->on('news.id', '=', 'latest_news.max_id');
                        }
                    )->get();
            } else {
                $data['news'] = News::where('id', '>', 0)->where('category_id', $data->id)->orderBy('ordering', 'ASC')->take(10)->get();
            }
        }
        $about_us = AboutUs::where('id', '>', 0)->first();
        $dataSeo['image'] = $about_us->logo;
        if (isset($data->avatar)) {
            $dataSeo['image'] = $data->avatar;
        }
        if ($model_name === 'News') {
            $data['newsPre'] = $data->news_category->news()->where('id', '<>', $data->id)->limit(3)->get();
        }
        if ($model_name === 'NewsCategory') {
            $data['newsPre'] = $data->news()->paginate(5)->withQueryString();
        }
        if (!isset($data->meta_title) || $data->meta_title !== 'null') {
            $dataSeo['title'] = $data->meta_title;
        }
        if (!isset($data->meta_description) || $data->meta_description !== 'null') {
            $dataSeo['description'] = $data->meta_description;
        }
        if (!isset($data->meta_key_word) || $data->meta_key_word !== 'null') {
            $dataSeo['keywords'] = $data->meta_key_word;
        }
        
        $tagIds = DB::table('tag_news')->where('news_id', '=', $data->id)->pluck('tag_id')->toArray();;
        $tagNames = DB::table('tags')->whereIn('id', $tagIds)->pluck('name')->toArray();
        return view($view, compact(['data', 'dataSeo', 'tagNames']));
    }

    public function product_search(Request $request) {
        $input = $request->get('keyword');
        $tagIds = DB::table('tags')->where('name', 'like', '%' . $input . '%')->pluck('id')->toArray();;
        $productIds = DB::table('tag_products')->whereIn('tag_id', $tagIds)->pluck('product_id')->toArray();
        $categoryIds = DB::table('product_categories')->whereIn('product_id', $productIds)->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $categoryIds)->orderBy('ordering', 'ASC')->get();

        return view('frontend.product.result_search', compact(['categories', 'input']));

    }

    public function listCategory()
    {
        $categories = [];
        $rootCategories = Category::where('id', '>=', 0)->where('parent_id', '=', null)->orWhere('parent_id', '=', '')->orderBy('ordering', "ASC")->get();
        foreach ($rootCategories as $rootCategory) {
            foreach ($rootCategory->child as $cat) {
                $proId = [];
                foreach ($cat->products as $pro) {
                    $proId[] = $pro->id;
                }
                foreach ($cat->child as $child) {
                    foreach ($child->products as $pro) {
                        $proId[] = $pro->id;
                    }
                }
                $cat['countProduct'] = Product::whereIn('id', $proId)->distinct()->count();
                $categories[] = $cat;
            }
        }

        return view('frontend.list_category', compact(['categories']));
    }

    public function listProduct(Request $request) {
        $search = $request->get('s');
        $query =  Product::where('id', '>', 0);
        if ($search) {
            $query = $query->where('name', 'like', '%' . $search . '%');
        }
        $limit = $request->get('limit') ? $request->get('limit') : 12;
        $products = $query->paginate($limit)->withQueryString();
        foreach ($products as $product) {
            $all_image = $this->filterVideo($product->images);
            $product['allImage'] = $all_image['images'];
        }

        return view('frontend.list_product', compact(['products', 'search', 'limit']));
    }
    public function cart() {
        $provinces = Province::all();
        $province_html = \App\Helper\StringHelper::getSelectOptionPlace($provinces, '', 'Vui lòng chọn thành phố', false, true);

        return view('frontend.cart', compact(['province_html']));
    }
}
