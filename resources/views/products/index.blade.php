@extends('layout.app')

@section('content')
    <div class="container mt-5 mb-5 p-4 bg-white shadow rounded-4" style="max-width: 1000px;">
        <div class="btn-group-center d-flex justify-content-center flex-wrap gap-2 mb-4">
            <a href="{{ route('products.create') }}" class="btn btn-success px-4">➕ Add Product</a>
            <a href="{{ url('/sell') }}" class="btn btn-danger px-4">💰 Sell Product</a>
            <a href="{{ url('/sales') }}" class="btn btn-secondary px-4">📑 Sales List</a>
            <a href="{{ route('products.stockEntries') }}" class="btn btn-outline-dark px-4">✏️ List Edit</a>
        </div>

        <h2 class="text-primary text-center mb-4">📦 Product List</h2>

        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Purchase Price</th>
                <th>Sale Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->purchase_price, 2) }}</td>
                    <td>{{ number_format($product->sale_price, 2) }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <a href="{{ route('products.addStockForm', $product->id) }}"
                           class="btn btn-sm btn-info shadow-sm">➕ Add Quantity</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">⚠️ No products found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{-- CSS --}}
    <style>
        body {
            background: #f4f9ff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .btn {
            transition: 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
            filter: brightness(0.9);
        }
        table td, table th {
            vertical-align: middle;
        }
    </style>
@endsection
