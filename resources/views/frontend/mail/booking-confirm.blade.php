<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>We’ve Received Your Booking Request</title>
</head>
<body style="font-family: Arial, sans-serif;">
<h2>We’ve Received Your Booking Request</h2>
<p>Dear <strong>{{ $order->customer_name }}</strong>,</p>
<p>Thank you for your interest in our farm tour!</p>
<p>We have received your booking request and are currently checking availability for your selected date. Please allow us a moment — we will get back to you shortly with a confirmation via email or message once your reservation is verified.</p>

<h3>Booking Request Details:</h3>
<ul>
    <li><strong>Tour Name:</strong> {{ $product_name }}</li>
    <li><strong>Tour Type:</strong> {{ $type }}</li>
    <li><strong>Preferred Date:</strong> {{ $date_format }} </li>
    <li><strong>Total Price:</strong> {{ number_format($order->price , 0, ',', '.') }} vnd</li>
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

<p>If you have any questions in the meantime, please feel free to contact us.</p>
<p>We will reach out to you soon once we confirm availability.</p> <br>

<p>Warm regards,</p>
<p><strong>ElonFarm Team</strong></p>
</body>
</html>
