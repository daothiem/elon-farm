<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $limit = 10) {
        $input = $request->all();
        $query = Order::where('id', '>', 0);
        if (isset($input['send_to'])) {
            $query = $query->where('send_to', $input['send_to']);
        }
        if (isset($input['ordering'])) {
            $query = $query->orderBy('created_at', $input['ordering']);
        } else {
            $query = $query->orderBy('created_at', "DESC");
        }
        if (isset($input['status'])) {
            $query = $query->where('status', $input['status']);
        }

        $data = $query->paginate($limit)->withQueryString();
        foreach ($data as $item) {
            $total_price = 0;
            foreach ($item->orderDetails as $detail) {
                $total_price += $detail->price_discount * $detail->quantity;
            }
            $item->total_price = $total_price;
        }
        $arrayStatus = [
            ['value' => 'progress', 'label' => 'Đang hoàn thiện'],
            ['value' => 'done', 'label' => 'Đã hoành thành'],
            ['value' => 'pending', 'label' => 'Chờ giải quyết'],
            ['value' => 'cancel', 'label' => 'Huỷ đơn'],
        ];
        $arraySendTo = [
            ['value' => 'daothiem1510@gmail.com', 'label' => 'Loại 1'],
            ['value' => '2', 'label' => 'Loại 2'],
        ];
        $selectStatus = $input['status'] ?? '';
        $selectSendTo = $input['send_to'] ?? '';
        $status_html = \App\Helper\StringHelper::getSelectOptionStatus($arrayStatus, $selectStatus , 'Vui lòng trạng thái', false);
        $send_to_html = \App\Helper\StringHelper::getSelectOptionStatus($arraySendTo, $selectSendTo , 'Vui lòng loại đơn', false);

        return view('admin.order.index', compact('data', 'input', 'status_html', 'send_to_html'));
    }
}
