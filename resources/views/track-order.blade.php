<!DOCTYPE html>
<html>

<head>
    <title>Order Tracking</title>
</head>

<body>
    <h1>Order Tracking</h1>
    <form action="{{ route('track.order') }}" method="GET">
        <label for="tracking_number">Tracking Number:</label>
        <input type="text" name="tracking_number" id="tracking_number" required>
        <button type="submit">Track Order</button>
    </form>

    @if (isset($order))
        <h2>Order Status</h2>
        <p>Order ID: {{ $order->id }}</p>
        <p>Status: {{ $order->status }}</p>
        <p>Shipping Address: {{ $order->shipping_address }}</p>
    @endif
</body>

</html>
