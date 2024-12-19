<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poster;
use App\Traits\HandleFile;
use Illuminate\Http\Request;

class PosterController extends Controller
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
        $query = Poster::where('id', '>=', 0);
        if ($request->get('name')) {
            $query = $query->where('title', 'like', '%' . $request->get('name') . '%');
        }
        if ($request->get('ordering')) {
            $query = $query->orderBy('ordering', $request->get('ordering'));
        } else {
            $query = $query->orderBy('ordering', "ASC");
        }
        $data = $query->paginate($limit);

        return view('admin.posters.index', compact('data',  'input'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.posters.create');
    }

    public function store(Request $request) {
        $input = $request->all();
        $input['is_show'] = (isset($input['is_show']) && $input['is_show']  === 'on') ? 1 : 0;
        $thumbnailName = public_path('/images/verification-img.png');

        if ($request->has('thumbnail')) {
            $response = $this->uploadAndConvertImage($request->file('thumbnail'), '/images/posters');
            $thumbnailName = $response->getData()->path;
        }
        $input['image'] = $thumbnailName;

        try {
            Poster::create($input);
            return redirect()->route('admin.posters.index')->with('success','Thêm mới slider thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.posters.index')->with('error','Thêm mới không thành công');
        }
    }

    public function edit($id) {
        $poster = Poster::find($id);
        if ($poster) {
            return view('admin.posters.create', compact('poster'));
        } else {
            return redirect()->route('admin.posters.index')->with('error','Poster không tồn tại');
        }
    }

    public function update($id, Request $request) {
        $poster = Poster::find($id);

        if ($poster) {
            $input = $request->all();
            $input['is_show'] = (isset($input['is_show']) && $input['is_show']  === 'on') ? 1 : 0;

            if ($request->has('thumbnail')) {
                $this->deleteFile($poster->image);

                $thumbnail = $request->file('thumbnail');
                $responsiveAvatar = $this->uploadAndConvertImage($thumbnail, '/images/posters');
                $input['image'] = $responsiveAvatar->getData()->path;
            }

            try {
                $poster->update($input);

                return redirect()->route('admin.posters.index')->with('success','Cập nhật thành công');
            } catch (\Exception $e) {
                return redirect()->route('admin.posters.index')->with('error','Cập nhật không thành công');
            }
        } else {
            return redirect()->route('admin.posters.index')->with('error','Slider không tồn tại');
        }
    }

    public function destroy($id) {
        $poster = Poster::find($id);
        if ($poster) {
            try {
                $this->deleteFile($poster->image);
                $poster->delete();
                return redirect()->route('admin.posters.index')->with('success','Xoá thành công');
            } catch (\Exception $e) {
                return redirect()->route('admin.posters.index')->with('error','Cập nhật không thành công');
            }
        } else {
            return redirect()->route('admin.posters.index')->with('error','Slider không tồn tại');
        }
    }
}
