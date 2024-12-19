<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
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
        $data = Menu::where('id', '>=', 0)->orderBy('ordering', "ASC")->paginate($limit);

        return view('admin.menu.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $parentId = Menu::all();
        $menu_html = \App\Helper\StringHelper::getSelectOption($parentId);

        return view('admin.menu.create', compact('menu_html'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();

        try {
            Menu::create($input);
            return redirect()->route('admin.menus.index')->with('success','Thêm mới thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.menus.index')->with('error','Thêm mới không thành công');
        }
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        if (isset($menu)) {
            $menuParent = Menu::where('id', '>=', 0)->where('id', '<>', $menu->id)->get();
            $menu_html = \App\Helper\StringHelper::getSelectOption($menuParent, $menu->parent_id);

            return view('admin.menu.create', compact('menu', 'menu_html'));

        } else {
            return redirect()->route('admin.menu.index')->with('error','Menu không tồn tại');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        if ($menu) {
            $input = $request->all();

            try {
                $menu->update($input);

                return redirect()->route('admin.menus.index')->with('success','Cập nhật thành công');
            } catch (\Exception $e) {
                return redirect()->route('admin.menus.index')->with('error','Cập nhật không thành công');
            }
        } else {
            return redirect()->route('admin.menus.index')->with('error','Menu không tồn tại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        if (isset($menu)) {
            DB::beginTransaction();
            try {
                $input['parent_id'] = null;
                $menu->child->each->update($input);
                $menu->delete();

                DB::commit();

                return redirect()->route('admin.menus.index')->with('success','Xoá menu thành công');
            } catch(\Exception $exception) {
                DB::rollBack();

                return redirect()->route('admin.menus.index')->with('error','Xoá menu không thành công');
            }

        } else {
            return redirect()->route('admin.menus.index')->with('error','Menu không tồn tại');

        }
    }
}
