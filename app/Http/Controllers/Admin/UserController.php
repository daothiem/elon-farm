<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $limit = 20): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $data = User::where('id', '>', 0)->paginate($limit);

        return view('admin.user.index', compact('data'));
    }
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        return view('admin.user.create');
    }

    public function store(Request $request) {
        $input = $request->all();

        $thumbnailName = 'verification-img.png';
        $thumbnailPath = public_path('/images/products');
        if ($request->has('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($thumbnailPath, $thumbnailName);
        }
        $input['avatar'] ='/images/products/' . $thumbnailName;

        try {
            $input['password'] = Hash::make('123456');
            User::create($input);

            return redirect()->route('admin.users.index')->with('success','Thêm mới người dùng thành công. Mật khẩu cho user mới: 123456');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.index')->with('error','Thêm mới người dùng không thành công');
        }
    }

    public function edit() {

    }

    public function update() {

    }

    public function resetPassword($id) {
        $user = User::find($id);
        if ($user) {
            try {
                $input['password'] = Hash::make('123456');
                $user->update($input);

                return redirect()->route('admin.users.index')->with('success','Reset password thành công. Password mới là 123456');
            } catch (\Exception $exception) {
                return redirect()->route('admin.users.index')->with('error','Reset password không thành công');
            }
        }

        return redirect()->route('admin.users.index')->with('error','Người dùng không tồn tại.');
    }

    public function changePassword(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        $check = Hash::check($input['old_password'], $user->password);

        if ($check) {
            $payload['password'] = Hash::make($input['new_password']);
            try {
                $user->update($payload);

                return redirect()->route('admin.index')->with('success','Đổi password thành công.');
            } catch (\Exception $e) {
                return redirect()->route('admin.index')->with('error','Đổi password không thành công.');
            }

        } else {
            return redirect()->route('admin.index')->with('error','Mật khẩu cũ không đúng.');
        }
    }

    public function destroy($id) {
        $user = User::find($id);
        if ($user) {
            try {
                $user->delete();
                return redirect()->route('admin.users.index')->with('success','Người dùng đã bị xoá');
            } catch (\Exception $exception) {
                return redirect()->route('admin.users.index')->with('error','Xoá người dùng không thành công');
            }
        } else {
            return redirect()->route('admin.users.index')->with('error','Người dùng không tồn tại.');
        }
    }
}
