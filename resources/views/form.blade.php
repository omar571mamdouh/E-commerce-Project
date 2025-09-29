@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4 text-center">Pay with Card (Test UI)</h2>

            <form id="fake-payment-form" action="{{ route('payment.process') }}" method="POST">
                @csrf
                <input type="hidden" name="amount" value="{{ $amount }}">

                <div class="mb-3">
                    <label>Card Number</label>
                    <input type="text" id="card_number" class="form-control" placeholder="4242 4242 4242 4242" maxlength="19" required>
                </div>

                <div class="mb-3">
                    <label>Expiry (MM/YY)</label>
                    <input type="text" id="expiry" class="form-control" placeholder="12/34" maxlength="5" required>
                </div>

                <div class="mb-3">
                    <label>CVV</label>
                    <input type="text" id="cvv" class="form-control" placeholder="123" maxlength="4" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Proceed to Stripe Checkout</button>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('fake-payment-form').addEventListener('submit', function(e) {
    // Validation محلي
    const cardNumber = document.getElementById('card_number').value.replace(/\s+/g,'');
    const expiry = document.getElementById('expiry').value.split('/');
    const cvv = document.getElementById('cvv').value;

    if (!(/^\d{16}$/.test(cardNumber))) {
        alert('Enter a valid 16-digit card number (e.g., 4242424242424242)');
        e.preventDefault();
        return;
    }
    if (!(expiry.length === 2 && /^\d{2}$/.test(expiry[0]) && /^\d{2}$/.test(expiry[1]))) {
        alert('Enter expiry as MM/YY');
        e.preventDefault();
        return;
    }
    if (!(cvv.length >=3 && cvv.length <=4 && /^\d+$/.test(cvv))) {
        alert('Enter a valid CVV');
        e.preventDefault();
        return;
    }
    // لو عدت الـ validation، الفورم هيتابع الـ POST العادي إلى route('payment.process')
});
</script>
@endsection
