@extends('layout.app')

@section('content')
    <div class="container mt-5 mb-5 p-4 bg-white shadow rounded-4" style="max-width: 1000px;">
        <h2 class="text-primary text-center mb-4">📥 Added Stock List</h2>

        {{-- جدول عرض الكميات المضافة --}}
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
            <tr>
                <th>Product Name</th>
                <th>Added Quantity</th>
                <th>Total Quantity</th>
                <th>Added Date</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($entries as $entry)
                <tr>
                    <td>{{ $entry->product->name ?? '❌ Deleted' }}</td>
                    <td class="text-success fw-bold">+{{ $entry->added_quantity }}</td>
                    <td>{{ $entry->product->quantity }}</td>
                    <td>{{ $entry->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">🚫 No stock entries found</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{-- زر رجوع --}}
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
