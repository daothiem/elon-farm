<?php

namespace App\Http\Middleware;

use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Frontend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $categories = Category::where('id', '>', 0)->orderBy('ordering', 'ASC')->get();
        $products = Product::where('id', '>', 0)->orderBy('ordering', 'ASC')->get();
        $infoBasic = ['email' => 'hanhoan.work2023@gmail.com', 'phoneNumber' => '038.358.0815', 'address' => 'Mỹ Đình Hà Nội'];
        if ($request->getHost() != 'phaohoasukien.vn'  && $request->getHost() != 'hanhoan.vn') {
            $infoBasic = ['email' => 'daothiem1510@gmail.com', 'phoneNumber' => '0987.234.972', 'address' => 'Tân Hưng Vĩnh Bảo tp.Hải Phòng'];
        }

        $support_customer = Service::where('type', 1)->orderBy('ordering', 'ASC')->get();
        $service_about_us = Service::where('type', 2)->orderBy('ordering', 'ASC')->take(8)->get();
        $about_us = AboutUs::where('id', '>', 0)->first();
        View::share([
            'global_products' => $products,
            'infoBasic' => $infoBasic,
            'support_customer' => $support_customer,
            'service_about_us' => $service_about_us,
            'about_us' => $about_us,
            'categories' => $categories,
        ]);

        return $next($request);
    }
}
