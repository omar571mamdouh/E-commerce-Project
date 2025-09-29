@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">🛒 Your Shopping Cart</h1>

    {{-- Flash Messages --}}
    @if(session('success'))
    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if($cart && count($cart) > 0)
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach($cart as $id => $item)
                @php
                $total = $item['price'] * $item['quantity'];
                $grandTotal += $total;
                @endphp
                <tr>
                    <td>
                        <img src="{{ asset('images/' . $item['image']) }}"
                            class="img-thumbnail"
                            style="width: 70px; height: 70px; object-fit: cover;">
                    </td>
                    <td class="fw-bold">{{ $item['name'] }}</td>
                    <td>
                        <form action="{{ route('cart.update', $id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}">
                            <button type="submit">Update</button>
                        </form>

                    </td>
                    <td>{{ $item['price'] }} Pound</td>
                    <td>{{ $total }} Pound</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Remove
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Grand Total & Checkout --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 gap-3">
        <h4 class="fw-bold">Grand Total: <span class="text-success">{{ $grandTotal }} Pound</span></h4>
        <a href="#" class="btn btn-success btn-lg">
            <i class="bi bi-credit-card"></i> Proceed to Checkout
        </a>
    </div>
    @else
    <div class="text-center mt-5">
        <p class="fs-5">Your cart is empty.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
            🛍 Continue Shopping
        </a>
    </div>
    @endif
</div>
@endsection