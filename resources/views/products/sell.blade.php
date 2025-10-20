@extends('layout.app')

@section('content')
    <div class="container mt-5 mb-5 p-4 bg-white shadow rounded-4" style="max-width: 700px;">
        <h2 class="text-danger text-center mb-4">💸 Sell Product</h2>

        <form action="{{ url('/sell') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Customer Name --}}
            <div class="mb-3">
                <label class="form-label fw-bold">👤 Customer Name</label>
                <input type="text" name="customer_name" class="form-control" placeholder="Enter customer name" required>
            </div>

            {{-- Product Select --}}
            <div class="mb-3">
                <label class="form-label fw-bold">📦 Select Product</label>
                <select name="product_id" class="form-select" required>
                    <option value="">-- Select --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->name }} (Available: {{ $product->quantity }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Quantity --}}
            <div class="mb-3">
                <label class="form-label fw-bold">🔢 Quantity Required</label>
                <input type="number" name="quantity" class="form-control" required min="1" placeholder="Enter quantity">
            </div>

            {{-- Upload Image --}}
            <div class="mb-3">
                <label for="upload_image" class="form-label fw-bold">🖼 Upload Receipt (Optional)</label>
                <input type="file" name="upload_image" id="upload_image" class="form-control" accept="image/*" onchange="previewImage(event)">
            </div>

            {{-- Image Preview --}}
            <div class="text-center mb-3" id="preview-container" style="display: none;">
                <p class="fw-bold">Preview:</p>
                <img id="preview" src="" alt="Preview" class="img-thumbnail" width="200">
            </div>

            {{-- Buttons --}}
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-danger px-4">💸 Sell</button>
                <a href="{{ route('products.index') }}" class="btn btn-outline-dark px-4">⬅ Close</a>
            </div>
        </form>
    </div>

    {{-- Custom CSS --}}
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
    </style>

    {{-- JavaScript for Image Preview --}}
    <script>
        function previewImage(event) {
            const previewContainer = document.getElementById('preview-container');
            const preview = document.getElementById('preview');
            const file = event.target.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
                previewContainer.style.display = 'block';
            } else {
                preview.src = "";
                previewContainer.style.display = 'none';
            }
        }
    </script>
@endsection
