<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\HandleFile;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
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
        $query = Slider::where('id', '>=', 0);
        if ($request->get('name')) {
            $query = $query->where('title', 'like', '%' . $request->get('name') . '%');
        }
        if ($request->get('ordering')) {
            $query = $query->orderBy('ordering', $request->get('ordering'));
        } else {
            $query = $query->orderBy('ordering', "ASC");
        }
        $data = $query->paginate($limit);

        return view('admin.slider.index', compact('data',  'input'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request) {
        $input = $request->all();
        $input['is_show'] = (isset($input['is_show']) && $input['is_show']  === 'on') ? 1 : 0;
        $thumbnailName = public_path('/images/verification-img.png');

        if ($request->has('thumbnail')) {
            $response = $this->uploadAndConvertImage($request->file('thumbnail'), '/images/sliders');
            $thumbnailName = $response->getData()->path;
        }
        $input['image'] = $thumbnailName;

        try {
            Slider::create($input);
            return redirect()->route('admin.sliders.index')->with('success','Thêm mới slider thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.sliders.index')->with('error','Thêm mới không thành công');
        }
    }

    public function edit($id) {
        $slider = Slider::find($id);
        if ($slider) {
            return view('admin.slider.create', compact('slider'));
        } else {
            return redirect()->route('admin.sliders.index')->with('error','Slider không tồn tại');
        }
    }

    public function update($id, Request $request) {
        $slider = Slider::find($id);

        if ($slider) {
            $input = $request->all();
            $input['is_show'] = (isset($input['is_show']) && $input['is_show']  === 'on') ? 1 : 0;
            if ($request->has('thumbnail')) {
                $this->deleteFile($slider->image);
                $thumbnail = $request->file('thumbnail');
                $responsiveAvatar = $this->uploadAndConvertImage($thumbnail, '/images/customers');
                $input['image'] = $responsiveAvatar->getData()->path;
            }
            try {
                $slider->update($input);

                return redirect()->route('admin.sliders.index')->with('success','Cập nhật thành công');
            } catch (\Exception $e) {
                return redirect()->route('admin.sliders.index')->with('error','Cập nhật không thành công');
            }
        } else {
            return redirect()->route('admin.sliders.index')->with('error','Slider không tồn tại');
        }
    }

    public function destroy($id) {
        $slider = Slider::find($id);
        if ($slider) {
            try {
                $this->deleteFile($slider->image);
                $slider->delete();
                return redirect()->route('admin.sliders.index')->with('success','Xoá thành công');
            } catch (\Exception $e) {
                return redirect()->route('admin.sliders.index')->with('error','Cập nhật không thành công');
            }
        } else {
            return redirect()->route('admin.sliders.index')->with('error','Slider không tồn tại');
        }
    }
}
