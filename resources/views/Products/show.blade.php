@extends('layouts.main')

@section('title', $product->name)

@section('content')
<div class="container mt-4">
    <div class="row">
        {{-- صورة المنتج --}}
        <div class="col-md-6 text-center">
            <img src="{{ asset('images/' . $product->image) }}"
                 class="img-fluid rounded shadow"
                 alt="{{ $product->name }}"
                 style="max-height: 450px; object-fit: cover; width: 100%;">
        </div>

        {{-- تفاصيل المنتج --}}
        <div class="col-md-6">
            <div class="p-3">
                <h1 class="h2 mb-3 text-dark">{{ $product->name }}</h1>
                
                <div class="price-box p-3 mb-4 bg-light rounded border-start border-success border-3">
                    <h4 class="text-success mb-0">{{ $product->price }} Pound</h4>
                </div>

                <div class="mb-4">
                    <h6 class="text-muted">Description:</h6>
                    <p class="text-secondary">{{ $product->description }}</p>
                </div>

                {{-- form إضافة للسلة --}}
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mb-4">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        <i class="bi bi-cart-plus"></i> Add To Cart
                    </button>
                </form>

                {{-- معلومات إضافية --}}
                <div class="product-info bg-light p-3 rounded">
                    <div class="row">
                        <div class="col-6">
                            <small class="text-muted">SKU:</small>
                            <div class="fw-semibold">#{{ $product->id }}</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Status:</small>
                            <div class="text-success fw-semibold">In Stock</div>
                        </div>
                    </div>
                </div>

                {{-- badges --}}
                <div class="mt-3">
                    <span class="badge bg-warning text-dark me-2">New</span>
                    <span class="badge bg-info">Bestseller</span>
                </div>
            </div>
        </div>
    </div>

    {{-- منتجات مشابهة --}}
    <div class="mt-5">
        <h3 class="mb-4 text-center">Related Products</h3>
        <div class="row">
            @if(isset($relatedProducts))
                @foreach($relatedProducts->take(3) as $related)
                <div class="col-md-4 mb-3">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('images/' . $related->image) }}" 
                             class="card-img-top" 
                             alt="{{ $related->name }}"
                             style="height: 180px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h6 class="card-title">{{ $related->name }}</h6>
                            <p class="text-success fw-bold">{{ $related->price }} Pound</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center text-muted">
                    <p>No related products available</p>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.price-box {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.card {
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-3px);
}

@media (max-width: 768px) {
    .card {
        margin-bottom: 1rem;
    }
}
</style>
@endsection