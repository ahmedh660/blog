@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">➕ Add New Product</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('/products') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Purchase Price</label>
                        <input type="number" name="purchase_price" class="form-control" placeholder="Enter purchase price" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Sale Price</label>
                        <input type="number" name="sale_price" class="form-control" placeholder="Enter sale price" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Enter quantity" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success px-4">💾 Save</button>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary px-4">❌ Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Extra CSS --}}
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 5px rgba(13,110,253,.5);
        }
    </style>
@endsection
