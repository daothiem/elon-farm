<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Farm Tour Booking Alert</title>
</head>
<body style="font-family: Arial, sans-serif;">
<h2>New Farm Tour Booking Alert</h2>
<p>Dear Admin,</p>
<p>A new farm tour booking has been received from the website. Below are the booking details:</p>

<h3>Tour Details:</h3>
<ul>
    <li><strong>Tour Name:</strong> {{ $product_name }}</li>
    <li><strong>Tour Type:</strong> {{ $type }}</li>
    <li><strong>Start Date:</strong> {{ $date_format }}</li>
    <li><strong>Total Price:</strong> {{ number_format($order->price, 0, ',', '.')}} vnd</li>
</ul>

<h3>Customer Information:</h3>
<ul>
    <li><strong>Name:</strong> {{ $order->customer_name }}</li>
    <li><strong>Email:</strong> {{ $order->customer_address_mail }}</li>
    <li><strong>Phone Number:</strong> {{ $order->customer_number_phone }}</li>
</ul>

<h3>Participants:</h3>
<ul>
    <li><strong>Adults:</strong> {{ $order->adults }}</li>
    <li><strong>Youth:</strong> {{ $order->youth }}</li>
    <li><strong>Children:</strong> {{ $order->children }}</li>
    <li><strong>Special request:</strong> {{ $order->special_request }}@if($order->special_request_text !== null && $order->special_request_text != ''), {{$order->special_request_text}}@endif</li>
</ul>

<p>Please review the booking details and take necessary actions.</p>
<p>Best regards,</p>
<p><strong>Farm Tour Booking System</strong></p>
</body>
</html>
