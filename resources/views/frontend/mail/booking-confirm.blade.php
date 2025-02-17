<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Farm Tour Booking Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif;">
<h2>Farm Tour Booking Confirmation</h2>
<p>Dear <strong>{{ $order->customer_name }}</strong>,</p>
<p>Thank you for booking a farm tour with us. Below are your booking details:</p>

<h3>Tour Details:</h3>
<ul>
    <li><strong>Tour Name:</strong> {{ $product_name }}</li>
    <li><strong>Tour Type:</strong> {{ $type }}</li>
    <li><strong>Start Date:</strong> {{ $order->date }} </li>
    <li><strong>Total Price:</strong> {{ $order->price }} vnd</li>
</ul>

<h3>Customer Information:</h3>
<ul>
    <li><strong>Name:</strong> {{ $order->customer_name }}</li>
    <li><strong>Email:</strong> {{ $order->customer_address_mail }}</li>
    <li><strong>Phone Number:</strong> {{ $order->customer_number_phone }}@if($order->special_request_text !== null && $order->special_request_text != ''), {{$order->special_request_text}}@endif</li>
</ul>

<h3>Participants:</h3>
<ul>
    <li><strong>Adults:</strong> {{ $order->adults }}</li>
    <li><strong>Youth:</strong> {{ $order->youth }}</li>
    <li><strong>Children:</strong> {{ $order->children }}</li>
    <li><strong>Special request:</strong> {{ $order->special_request }}</li>
</ul>

<p>If you have any questions or need further assistance, feel free to contact us.</p>
<p>Best regards,</p>
<p><strong>ElonFarm Team</strong></p>
</body>
</html>
