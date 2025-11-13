@extends('layout.app')
@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-sm border-0" style="max-width: 450px; width: 100%;">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Add to {{ $product->name }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('products.storeStock', $product->id) }}" method="POST" id="addQuantityForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Current Quantity</label>
                        <input type="text" class="form-control bg-light"
                               value="{{ $product->quantity }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Add Quantity</label>
                        <input type="number" name="added_quantity" class="form-control"
                               required min="1" id="addedQuantity">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success px-4">Add</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary px-4">Close</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- JavaScript للتحقق من الكمية --}}
    <script>
        document.getElementById('addQuantityForm').addEventListener('submit', function(e) {
            const quantity = document.getElementById('addedQuantity').value;
            if (quantity <= 0) {
                e.preventDefault();
                alert("Please enter a valid quantity greater than 0.");
            }
        });
    </script>
@endsection
