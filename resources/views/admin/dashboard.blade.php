@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.products.index') }}">Products</a></li>
                <li><a href="{{ route('admin.shipments.index') }}">Shipments</a></li>
                <li><a href="{{ route('admin.orders.index') }}">Orders</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>

        <a href="{{ route('products.index') }}">View Products</a>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total Products</div>
                    <div class="card-body">
                        <h2>{{ $productsCount }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total Orders</div>
                    <div class="card-body">
                        <h2>{{ $ordersCount }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total Shipments</div>
                    <div class="card-body">
                        <h2>{{ $shipmentsCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
