<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use \Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $limit = 10) {
        $input = $request->all();
        $query = Promotion::where('id', '>=', 0);
        if ($request->get('ordering') !== null) {
            $query = $query->orderBy('created_at', $request->get('ordering'));
        } else {
            $query = $query->orderBy('created_at', "ASC");
        }
        $data = $query->paginate($limit)->withQueryString();

        return view('admin.promotion.index', compact('data', 'input'));
    }

    public function create() {
        return view('admin.promotion.create');
    }
    public function store(Request $request) {
        $input = $request->all();

        try {
            Promotion::create($input);

            return redirect()->route('admin.promotions.index')->with('success','Thêm mới thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.promotions.index')->with('error','Thêm mới không thành công');
        }
    }
    public function edit($id) {
        $promotion = Promotion::find($id);

        if ($promotion) {
            return view('admin.promotion.create', compact('promotion'));
        } else {
            return redirect()->route('admin.promotions.index')->with('error','Chương trình KM không tồn tại');
        }
    }
    public function update($id, Request $request) {
        $promotion = Promotion::find($id);
        $input = $request->all();
        if ($promotion) {
            try {
                $promotion->update($input);

                return redirect()->route('admin.promotions.index')->with('success','Cập nhật thành công');
            } catch (\Exception $e) {
                return redirect()->route('admin.promotions.index')->with('error','Chương trình KM không tồn tại');
            }
        } else {
            return redirect()->route('admin.promotions.index')->with('error','Chương trình KM không tồn tại');
        }

    }
}
