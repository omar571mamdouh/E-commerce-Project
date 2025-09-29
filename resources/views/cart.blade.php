@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="text-center mb-4">
        <h1 class="h2"><i class="bi bi-cart me-2"></i>Your Shopping Cart</h1>
        <p class="text-muted">Review and manage your selected items</p>
    </div>

    @if($cart && count($cart) > 0)
    <div class="row">
        <!-- Cart Items -->
        <div class="col-lg-8">
            @php $grandTotal = 0; @endphp
            @foreach($cart as $id => $item)
                @php 
                    $total = $item['price'] * $item['quantity']; 
                    $grandTotal += $total; 
                @endphp
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-3">
                                <img src="{{ asset('images/' . $item['image']) }}" class="img-fluid rounded" alt="{{ $item['name'] }}" style="height: 80px; object-fit: cover;">
                            </div>
                            <div class="col-md-3 col-9">
                                <h6 class="mb-1">{{ $item['name'] }}</h6>
                                <p class="text-success mb-0 fw-semibold">{{ number_format($item['price'], 2) }} EGP</p>
                            </div>
                            <div class="col-md-3 col-6 mt-2 mt-md-0">
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="10" class="form-control text-center" style="width: 70px;">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-arrow-clockwise"></i></button>
                                </form>
                            </div>
                            <div class="col-md-2 col-3 mt-2 mt-md-0 text-center">
                                <div class="fw-bold text-success">{{ number_format($total, 2) }} EGP</div>
                            </div>
                            <div class="col-md-2 col-3 mt-2 mt-md-0 text-center">
                                <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this item?')">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Cart Summary -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-2"><span>Subtotal:</span><span>{{ number_format($grandTotal, 2) }} EGP</span></div>
                    <div class="d-flex justify-content-between mb-2"><span>Delivery:</span><span class="text-success">Free</span></div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3"><span class="fw-bold">Total:</span><span class="fw-bold text-success">{{ number_format($grandTotal, 2) }} EGP</span></div>
                    
                    <div class="d-grid gap-2">
                        <!-- إرسال المبلغ لفورم الدفع -->
                        <form action="{{ route('payment.form') }}" method="GET">
                            <input type="hidden" name="amount" value="{{ $grandTotal }}">
                            <button type="submit" class="btn btn-success w-100"><i class="bi bi-credit-card me-1"></i>Proceed to Checkout</button>
                        </form>

                        <a href="{{ url('/products') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-1"></i>Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="text-center py-5">
            <div class="bg-light rounded p-5">
                <i class="bi bi-cart-x display-1 text-muted mb-3"></i>
                <h3 class="text-muted">Your cart is empty</h3>
                <p class="text-secondary">Looks like you haven't added any items to your cart yet.</p>
                <a href="{{ url('/products') }}" class="btn btn-primary btn-lg mt-3"><i class="bi bi-bag me-2"></i>Start Shopping</a>
            </div>
        </div>
    @endif
</div>
@endsection
