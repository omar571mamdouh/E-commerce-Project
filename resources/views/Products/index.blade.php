@extends('layouts.main')

@section('content')
<div class="container-fluid py-5">
    <!-- Header Section -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-gradient mb-3">
            <i class="fas fa-store me-3"></i>Products Menu
        </h1>
        <p class="lead text-muted">Discover our amazing collection of products</p>
        <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
            <!-- Search Bar -->
            <div class="search-container position-relative">
                <input type="text" class="form-control search-input" placeholder="Search products..." id="productSearch">
                <i class="fas fa-search search-icon"></i>
            </div>
            
            <!-- Filter Dropdown -->
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-filter me-2"></i>Filter
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-up me-2"></i>Price: Low to High</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-sort-amount-down me-2"></i>Price: High to Low</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-star me-2"></i>Most Popular</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
        @foreach($products as $product)
        <div class="col product-card" data-product-name="{{ strtolower($product->name) }}">
            <div class="card product-item h-100 shadow-hover">
                <!-- Image Container with Badge -->
                <div class="image-container position-relative overflow-hidden">
                    <img src="{{ asset('images/' . $product->image) }}" 
                         class="card-img-top product-img" 
                         alt="{{ $product->name }}"
                         loading="lazy">
                    
                    <!-- Stock Badge -->
                    @if($product->stock > 0)
                        <span class="badge bg-success stock-badge">
                            <i class="fas fa-check-circle me-1"></i>In Stock
                        </span>
                    @else
                        <span class="badge bg-danger stock-badge">
                            <i class="fas fa-times-circle me-1"></i>Out of Stock
                        </span>
                    @endif
                </div>

                <div class="card-body d-flex flex-column">
                    <!-- Product Title -->
                    <h5 class="card-title product-title">
                        <i class="fas fa-box-open me-2 text-primary"></i>{{ $product->name }}
                    </h5>
                    
                    <!-- Product Description -->
                    <p class="card-text text-muted flex-grow-1">{{ $product->description }}</p>
                    
                    <!-- Stock Info -->
                    <div class="stock-info mb-3">
                        <small class="text-muted">
                            <i class="fas fa-warehouse me-1"></i>
                            <span class="stock-text {{ $product->stock > 10 ? 'text-success' : ($product->stock > 0 ? 'text-warning' : 'text-danger') }}">
                                {{ $product->stock }} items available
                            </span>
                        </small>
                    </div>
                    
                    <!-- Price Section -->
                    <div class="price-section mb-3">
                        <h4 class="price-tag mb-0">
                            <i class="fas fa-tag me-2 text-success"></i>
                            <span class="fw-bold text-primary">{{ number_format($product->price, 2) }}</span>
                            <small class="text-muted">EGP</small>
                        </h4>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="action-buttons mt-auto">
                        <div class="row g-2">
                            <div class="col-12">
                                <a href="{{ route('products.show', $product->id) }}" 
                                   class="btn btn-outline-info w-100 btn-hover">
                                    <i class="fas fa-info-circle me-2"></i>View Details
                                </a>
                            </div>
                            <div class="col-12">
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-grid">
                                    @csrf
                                    <button type="submit" 
                                            class="btn btn-primary btn-cart {{ $product->stock <= 0 ? 'disabled' : '' }}"
                                            {{ $product->stock <= 0 ? 'disabled' : '' }}>
                                        <i class="fas fa-shopping-cart me-2"></i>
                                        {{ $product->stock > 0 ? 'Add To Cart' : 'Out of Stock' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Empty State -->
    @if($products->isEmpty())
    <div class="text-center py-5">
        <i class="fas fa-box-open fa-5x text-muted mb-4"></i>
        <h3 class="text-muted">No Products Found</h3>
        <p class="text-muted">Check back later for new products!</p>
    </div>
    @endif
</div>

<!-- Simplified CSS -->
<style>
    /* Modern Color Scheme */
    :root {
        --primary-color: #4f46e5;
        --success-color: #10b981;
        --danger-color: #ef4444;
        --warning-color: #f59e0b;
        --dark-color: #1f2937;
        --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --shadow-light: 0 2px 10px rgba(0,0,0,0.1);
        --shadow-medium: 0 8px 30px rgba(0,0,0,0.12);
        --shadow-heavy: 0 20px 60px rgba(0,0,0,0.2);
    }

    /* Page Header Styling */
    .text-gradient {
        background: var(--gradient-1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Search Container */
    .search-container {
        min-width: 300px;
    }

    .search-input {
        padding-left: 45px;
        border-radius: 25px;
        border: 2px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
    }

    /* Product Cards */
    .product-item {
        border: none;
        border-radius: 20px;
        transition: all 0.4s ease;
        background: white;
        overflow: hidden;
    }

    .shadow-hover {
        box-shadow: var(--shadow-light);
    }

    .product-item:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-heavy);
    }

    /* Image Container */
    .image-container {
        position: relative;
        height: 250px;
    }

    .product-img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .product-item:hover .product-img {
        transform: scale(1.05);
    }

    /* Stock Badge */
    .stock-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 0.75rem;
        padding: 8px 12px;
        border-radius: 20px;
        box-shadow: var(--shadow-light);
    }

    /* Card Body */
    .card-body {
        padding: 1.5rem;
    }

    .product-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 0.75rem;
    }

    .card-text {
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    /* Stock Info */
    .stock-info {
        padding: 8px 12px;
        background: #f8fafc;
        border-radius: 8px;
        border-left: 4px solid var(--success-color);
    }

    .stock-info .stock-text.text-warning {
        color: var(--warning-color) !important;
    }

    .stock-info .stock-text.text-danger {
        color: var(--danger-color) !important;
    }

    /* Price Section */
    .price-section {
        background: linear-gradient(45deg, #f8fafc, #e5e7eb);
        padding: 15px;
        border-radius: 12px;
        text-align: center;
    }

    .price-tag {
        color: var(--dark-color);
        font-size: 1.25rem;
    }

    /* Action Buttons */
    .action-buttons {
        margin-top: auto;
    }

    .btn-hover {
        transition: all 0.3s ease;
        border-width: 2px;
    }

    .btn-hover:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
    }

    .btn-cart {
        background: var(--gradient-1);
        border: none;
        font-weight: 600;
        padding: 12px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .btn-cart:hover:not(.disabled) {
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
    }

    .btn-cart.disabled {
        background: #6b7280;
        cursor: not-allowed;
    }

    /* Filter Animations */
    .product-card {
        transition: all 0.5s ease;
    }

    .product-card.filtered-out {
        opacity: 0;
        transform: scale(0.8);
        pointer-events: none;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .search-container {
            min-width: 250px;
        }
        
        .image-container {
            height: 200px;
        }
        
        .card-body {
            padding: 1rem;
        }
    }
</style>

<!-- Simplified JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Live Search Functionality
    const searchInput = document.getElementById('productSearch');
    const productCards = document.querySelectorAll('.product-card');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            productCards.forEach(card => {
                const productName = card.dataset.productName;
                const productDescription = card.querySelector('.card-text').textContent.toLowerCase();
                
                if (productName.includes(searchTerm) || productDescription.includes(searchTerm)) {
                    card.classList.remove('filtered-out');
                } else {
                    card.classList.add('filtered-out');
                }
            });
        });
    }

    // Add to Cart Animation
    document.querySelectorAll('.btn-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            if (!this.disabled) {
                // Change button text temporarily
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check me-2"></i>Added!';
                this.classList.add('btn-success');
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('btn-success');
                }, 2000);
            }
        });
    });
});
</script>
@endsection