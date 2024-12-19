<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReview;
use \Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class ProductReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $limit = 10) {
        $data = ProductReview::where('id', '>=', 0)->paginate($limit);

        return view('admin.productReview.index', compact('data'));
    }

    public function create() {
        $products = Product::all();
        $product_html = \App\Helper\StringHelper::getSelectOption($products, '', 'Vui lòng chọn', false, true, 'name');

        return view('admin.productReview.create', compact('product_html'));
    }

    public function store(Request $request) {
        $input = $request->all();

        if (isset($input['gallery'])) {
            $input['images'] = implode(',', $input['gallery']);
        }
        $input['comment_at'] = date('Y-m-d');
        try{
            ProductReview::create($input);

            return redirect()->route('admin.product_reviews.index')->with('success','Thêm mới nhận xét thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.product_reviews.index')->with('error','Thêm mới nhận xét không thành công');
        }
    }

    public function edit($id) {
        $productReview = ProductReview::find($id);

        if ($productReview) {
            $products = Product::all();
            $product_html = \App\Helper\StringHelper::getSelectOption($products,$productReview->product_id , 'Vui lòng chọn', false, true, 'name');

            return view('admin.productReview.create', compact('product_html', 'productReview'));
        } else {
            return redirect()->route('admin.product_reviews.index')->with('error','Nhận xét sản phẩm không tồn tại');
        }
    }

    public function update($id, Request $request) {
        $productReview = ProductReview::find($id);

        if ($productReview) {
            $input = $request->all();

            if (isset($input['gallery'])) {
                $input['images'] = implode(',', array_unique($input['gallery']));
            } else {
                $input['images'] = '';
            }

            try {
                $productReview->update($input);

                return redirect()->route('admin.product_reviews.index')->with('success','Cập nhật nhận xét sản phẩm thành công');
            } catch (\Exception $e) {
                return redirect()->route('admin.product_reviews.index')->with('error','Cập nhật nhận xét sản phẩm không thành công');
            }

        } else {
            return redirect()->route('admin.product_reviews.index')->with('error','Nhận xét sản phẩm không tồn tại');
        }
    }

    public function destroy($id) {
        $productReview = ProductReview::find($id);
        if ($productReview) {
            try {
                $productReview->delete();

                return redirect()->route('admin.product_reviews.index')->with('success','Xoá nhận xét sản phẩm thành công');
            } catch (\Exception $e) {
                return redirect()->route('admin.product_reviews.index')->with('error','Xoá nhận xét sản phẩm không thành công');
            }

        } else {
            return redirect()->route('admin.product_reviews.index')->with('error','Nhận xét sản phẩm không tồn tại');
        }
    }
}
