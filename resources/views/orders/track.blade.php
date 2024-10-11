@extends('layouts.app')

@section('content')
    <h1>Track Your Order</h1>
    <form action="{{ route('orders.track') }}" method="GET">
        <input type="text" name="tracking_number" placeholder="Enter Tracking Number" required>
        <button type="submit">Track</button>
    </form>

    @if (session('order'))
        <h2>Order Details</h2>
        <p>Order ID: {{ session('order')->id }}</p>
        <p>Status: {{ session('order')->status }}</p>
        <p>Tracking Number: {{ session('order')->tracking_number }}</p>
        <p>Carrier: {{ session('order')->carrier }}</p>
    @endif
@endsection
