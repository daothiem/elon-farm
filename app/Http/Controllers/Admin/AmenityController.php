<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AmenityController extends Controller
{
    public function index(Request $request, $limit = 10)
    {
        $input = $request->all();

        $query = Amenity::where('id', '>=', 0);

        if ($request->get('name')) {
            $query = $query->where('title', 'like', '%' . $request->get('name') . '%');
        }

        if ($request->get('ordering')) {
            $query = $query->orderBy('created_at', $request->get('ordering'));
        } else {
            $query = $query->orderBy('created_at', "ASC");
        }

        $data = $query->paginate($limit);

        return view('admin.amenity.index', compact('data', 'request', 'input'));
    }

    public function create()
    {
        return view('admin.amenity.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        try {
            Amenity::create($input);
            return redirect()->route('admin.amenities.index')->with('success','Thêm mới thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.amenities.index')->with('error','Thêm mới không thành công');
        }
    }

    public function edit($id)
    {
        $amenity = Amenity::find($id);
        if (isset($amenity)) {
            return view('admin.amenity.create', compact('amenity'));

        } else {
            return redirect()->route('admin.amenities.index')->with('error','Tiện ích không tồn tại');
        }
    }

    public function update(Request $request, $id)
    {
        $amenity = Amenity::find($id);
        if ($amenity) {
            try {
                $input = $request->all();
                $amenity->update($input);

                return redirect()->route('admin.amenities.index')->with('success','Cập nhật thành công');
            } catch (\Exception $e) {
                return redirect()->route('admin.amenities.index')->with('error','Cập nhật không thành công');
            }

        }

        return redirect()->route('admin.amenities.index')->with('error','Tiện ích tồn tại');
    }

    public function destroy($id)
    {
        $amenity = Amenity::find($id);
        if (isset($amenity)) {
            DB::beginTransaction();
            try {
                $amenity->delete();
                DB::commit();

                return redirect()->route('admin.amenities.index')->with('success','Xoá tiện ích thành công');
            } catch(\Exception $exception) {
                DB::rollBack();

                return redirect()->route('admin.amenities.index')->with('error','Xoá tiện ích không thành công');
            }
        } else {
            return redirect()->route('admin.amenities.index')->with('error','Tiện ích tồn tại');
        }
    }
}
