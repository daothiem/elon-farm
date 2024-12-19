<p>Dear Hân Hoan,</p>
<p> Bạn có liên hệ.</p>

<strong>Đơn hàng mới từ website.</strong>
<p><strong>Tên khách hàng: {{$order->customer_name}}</strong></p>
<p><strong>Số điện thoại: {{$order->customer_phone}}</strong></p>
<p><strong>Địa chỉ: {{$order->other_address}}, {{$order->ward?->full_name}}, {{$order->district?->full_name}}, {{$order->province?->full_name}} </strong></p>
<p><strong>Lời nhắn: {{$order->note}}</strong></p>

<p><strong>Chi tiết đơn hàng.</strong></p>
<table width="100%" cellpadding="0" cellspacing="0" border="1">
    <tr>
        <td>Stt</td>
        <td>Tên sản phẩm</td>
        <td>Giá</td>
        <td>Số lượng</td>
        <td>Thành tiền</td>
    </tr>
    @foreach($order->orderDetails as $index => $detail)
        <tr>
            <td>{{++$index}}</td>
            <td>{{$detail->product->name}}</td>
            <td>{{number_format($detail->price_discount)}}</td>
            <td>{{$detail->quantity}}</td>
            <td>{{number_format($detail->quantity * $detail->price_discount)}}đ</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4">Tổng</td>
        <td>{{number_format($totalPrice)}}đ</td>
    </tr>

</table>
