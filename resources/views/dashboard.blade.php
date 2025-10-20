@extends('layout.app')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4 fw-bold">Welcome to Admin Panel</h2>

        <div class="row justify-content-center g-4">
            <div class="col-md-4">
                <div class="card shadow-sm text-center border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">📝 Notes</h5>
                        <p class="text-muted">Manage and create blog articles.</p>
                        <a href="{{ route('posts.index') }}" class="btn btn-primary w-100">Go</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm text-center border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-success">🛒 Products Store</h5>
                        <p class="text-muted">Manage products, stock, and sales.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-success w-100">Go</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary px-4">⚙️ Profile Settings</a>
        </div>
    </div>

    {{-- Extra CSS --}}
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }
    </style>
@endsection
