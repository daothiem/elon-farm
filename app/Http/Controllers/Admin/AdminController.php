<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\News;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $countProduct = Product::all()->count();
        $categoryCount = Category::all()->count();
        $blogCount = News::all()->count();
        $staffCount = Staff::all()->count();

        return view('admin.index', compact(['countProduct', 'categoryCount', 'blogCount', 'staffCount']));
    }
}
