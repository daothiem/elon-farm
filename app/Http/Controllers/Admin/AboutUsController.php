<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Traits\HandleFile;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class AboutUsController extends Controller
{
    use HandleFile;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view() {
        $data = AboutUs::where('id', '>', 0)->first();
        if ($data) {
            return view('admin.about_us.view', compact('data'));
        }

        return view('admin.index', compact('data'));
    }

    public function update(Request $request) {
        $input = $request->all();
        $data = AboutUs::where('id', '>', 0)->first();
        if (!$data) {
            return redirect()->route('admin.about_us.view')->with('error','Cập nhật thông tin cơ bản không thành công');
        }
        if ($request->has('logo_pc')) {
            $response = $this->uploadAndConvertImage($request->file('logo_pc'), '/images/logo');
            $input['logo_pc'] = $response->getData()->path;
        }

        if ($request->has('logo_mobile')) {
            $response = $this->uploadAndConvertImage($request->file('logo_mobile'), '/images/logo');
            $input['logo_mobile'] = $response->getData()->path;
        }
        $data->update($input);

        return redirect()->route('admin.about_us.view')->with('success','Đã cập nhật thông tin cơ bản');
    }
}
