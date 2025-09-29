
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="login-card">
                <div class="card-header">
                    <h2><i class="fas fa-sign-in-alt"></i> Welcome Back</h2>
                </div>

                @if ($errors->any())
                    <div class="error-alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label><i class="fas fa-envelope"></i> Email Address</label>
                            <input type="email" name="email" class="form-input" value="{{ old('email') }}" placeholder="Enter your email" required>
                        </div>

                        <div class="form-group">
                            <label><i class="fas fa-lock"></i> Password</label>
                            <input type="password" name="password" class="form-input" placeholder="Enter your password" required>
                        </div>

                        <button type="submit" class="login-btn">
                            <i class="fas fa-arrow-right"></i> Login Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.login-card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(79, 172, 254, 0.15);
    overflow: hidden;
}

.card-header {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    padding: 25px;
    text-align: center;
    color: white;
}

.card-header h2 {
    margin: 0;
    font-size: 22px;
    font-weight: 600;
}

.card-header i {
    margin-right: 8px;
}

.error-alert {
    background: #fee;
    border: 1px solid #fcc;
    color: #c33;
    padding: 15px;
    margin: 0;
    border-radius: 0;
}

.error-alert i {
    margin-right: 8px;
}

.error-alert ul {
    margin: 5px 0 0 0;
    padding-left: 20px;
}

.card-body {
    padding: 30px;
    background: linear-gradient(145deg, #ffffff 0%, #f8fcff 100%);
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 6px;
    color: #2c3e50;
    font-weight: 600;
    font-size: 14px;
}

.form-group i {
    color: #4facfe;
    margin-right: 8px;
    width: 16px;
}

.form-input {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 15px;
    background: #f8f9fa;
    transition: all 0.3s ease;
    font-weight: 300;
}

.form-input::placeholder {
    color: #adb5bd;
    font-weight: 300;
}

.form-input:focus {
    outline: none;
    border-color: #4facfe;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(79, 172, 254, 0.1);
}

.login-btn {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 10px;
}

.login-btn:hover {
    background: linear-gradient(135deg, #36a9fc 0%, #00e5fc 100%);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(79, 172, 254, 0.3);
}

.login-btn i {
    margin-right: 8px;
}

@media (max-width: 768px) {
    .login-card {
        margin: 20px;
    }
    
    .card-body {
        padding: 25px 20px;
    }
    
    .card-header {
        padding: 20px;
    }
}
</style>