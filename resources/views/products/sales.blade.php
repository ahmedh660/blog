@extends('layout.app')

@section('content')
    <div class="container mt-5 mb-5 p-4 bg-white shadow rounded-4" style="max-width: 1100px;">
        <h2 class="text-primary text-center mb-4">🧾 All Sales List</h2>

        {{-- 🔹 حساب إجمالي الأرباح --}}
        @php
            $totalProfit = 0;
            foreach ($sales as $sale) {
                if ($sale->product) {
                    $totalProfit += ($sale->product->sale_price - $sale->product->purchase_price) * $sale->quantity;
                }
            }
        @endphp

        {{-- 🔹 كارت الأرباح --}}
        <div class="card mb-4 border-success shadow-sm">
            <div class="card-body text-center">
                <h4 class="card-title">💰 Total Gain</h4>
                <h3 class="text-success fw-bold">{{ number_format($totalProfit, 2) }} EG</h3>
            </div>
        </div>

        {{-- 🔹 جدول المبيعات --}}
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Sell Date</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->customer_name }}</td>
                    <td>{{ $sale->product->name ?? '❌ Deleted' }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ number_format($sale->quantity * ($sale->product->sale_price ?? 0), 2) }}</td>
                    <td>{{ $sale->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ $sale->user->name ?? 'Unknown' }}</td>
                    <td>
                        <a href="{{ route('sales.print', $sale->id) }}"
                           class="btn btn-sm btn-primary shadow-sm" target="_blank">
                            🖨 Print
                        </a>

                        @if ($sale->image)
                            <a href="{{ asset('storage/' . $sale->image) }}"
                               class="btn btn-sm btn-info shadow-sm" target="_blank">
                                🖼 Receipt
                            </a>
                        @else
                            <button class="btn btn-sm btn-secondary" disabled>🚫 No Image</button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-outline-dark px-4">⬅ Back to Products</a>
        </div>
    </div>

    {{-- CSS تحسينات --}}
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
