<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $limit = 10)
    {
        $data = Staff::where('id', '>=', 0)->orderBy('ordering', "ASC")->paginate($limit);

        return view('admin.staff.index', compact('data'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['avatar'] = '/images/staffs/male.png';
        if (isset($input['gender']) && $input['gender'] === 'nu') {
            $input['avatar'] = '/images/staffs/female.png';
        }

        try {
            Staff::create($input);
            return redirect()->route('admin.staffs.index')->with('success','Thêm mới thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.staffs.index')->with('error','Thêm mới không thành công');
        }
    }

    public function edit($id)
    {
        $staff = Staff::find($id);
        if (isset($staff)) {

            return view('admin.staff.create', compact('staff'));
        } else {
            return redirect()->route('admin.staffs.index')->with('error','Nhân viên không tồn tại');
        }
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::find($id);
        if ($staff) {
            $input = $request->all();

            if (isset($input['gender'])) {
                $img = $input['gender'] ? 'male.png' : 'female.png';
                $input['avatar'] ='/images/staffs/' .$img;
            }

            try {
                $staff->update($input);

                return redirect()->route('admin.staffs.index')->with('success','Cập nhật thành công');
            } catch (\Exception $e) {
                return redirect()->route('admin.staffs.index')->with('error','Cập nhật không thành công');
            }
        }
        return redirect()->route('admin.staffs.index')->with('error','Nhân viên không tồn tại');
    }

    public function destroy($id)
    {
        $staff = Staff::find($id);
        if (isset($staff)) {
            DB::beginTransaction();
            try {
                $staff->delete();
                DB::commit();

                return redirect()->route('admin.staffs.index')->with('success','Xoá nhân viên thành công');
            } catch(\Exception $exception) {
                DB::rollBack();

                return redirect()->route('admin.staffs.index')->with('error','Xoá nhân viên không thành công');
            }

        } else {
            return redirect()->route('admin.staffs.index')->with('error','Nhân viên không tồn tại');
        }
    }
}
