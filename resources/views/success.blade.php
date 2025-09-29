@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="success-card">
                <div class="success-header">
                    <i class="fas fa-check-circle success-icon"></i>
                    <h2>Payment Successful! 🎉</h2>
                </div>
                
                <div class="success-body">
                    <div class="detail-item">
                        <strong>Payment ID:</strong> {{ $payment->id }}
                    </div>
                    <div class="detail-item">
                        <strong>Amount:</strong> {{ $payment->amount }} EGP
                    </div>
                    <div class="detail-item">
                        <strong>Status:</strong> 
                        <span class="status-badge">{{ $payment->status }}</span>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="/" class="btn btn-primary">
                            <i class="fas fa-home"></i> Back to Home
                        </a>
                        <button onclick="window.print()" class="btn btn-outline">
                            <i class="fas fa-print"></i> Print
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.success-card {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(79, 172, 254, 0.15);
    overflow: hidden;
    animation: slideUp 0.5s ease-out;
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.success-header {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    padding: 40px;
    text-align: center;
    color: white;
}

.success-icon {
    font-size: 60px;
    margin-bottom: 15px;
    animation: bounceIn 0.6s ease-out;
}

@keyframes bounceIn {
    0% { opacity: 0; transform: scale(0.3); }
    100% { opacity: 1; transform: scale(1); }
}

.success-body {
    padding: 30px;
    background: linear-gradient(145deg, #ffffff 0%, #f8fcff 100%);
}

.detail-item {
    padding: 15px 20px;
    background: #f0f9ff;
    border-radius: 10px;
    margin-bottom: 15px;
    border-left: 4px solid #4facfe;
    font-size: 16px;
}

.status-badge {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    color: white;
    padding: 5px 15px;
    border-radius: 15px;
    font-size: 14px;
}

.action-buttons {
    display: flex;
    gap: 15px;
    margin-top: 25px;
}

.btn {
    flex: 1;
    padding: 12px 20px;
    border-radius: 10px;
    text-decoration: none;
    text-align: center;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    color: white;
}

.btn-outline {
    background: white;
    color: #4facfe;
    border: 2px solid #4facfe;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(79, 172, 254, 0.3);
}

@media (max-width: 768px) {
    .success-header { padding: 30px 20px; }
    .success-body { padding: 25px 20px; }
    .action-buttons { flex-direction: column; }
}

@media print {
    .action-buttons { display: none; }
}
</style>
@endsection