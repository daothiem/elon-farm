<?php

namespace App\Http\Middleware;

use App\Models\AboutUs;
use App\Models\Category;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\View;

class Backend
{
    public function handle(Request $request, Closure $next) {
        $about_us = AboutUs::where('id', '>', 0)->first();
        $parentCategory = Category::where('parent_id', '')->orWhere('parent_id', null)->orderBy('ordering', 'ASC')->get();
        View::share(['parentCategory' => $parentCategory, 'about_us' => $about_us]);
        return $next($request);
    }
}
