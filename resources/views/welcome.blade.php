@extends('layouts.main')


@section('content')
<div class="welcome-container">
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <!-- Text Section -->
            <div class="col-lg-6 text-center text-lg-start">
                <div class="welcome-badge">
                    <i class="fas fa-utensils me-2"></i>
                    <span>Premium Restaurant</span>
                </div>
                
                <h1 class="welcome-title">
                    Welcome to Our
                    <span class="text-gradient">Restaurant</span>
                </h1>
                
                <p class="welcome-description">
                    Experience the finest flavors, freshly prepared with love.
                    From mouth-watering appetizers to delightful desserts —
                    we bring you an unforgettable dining experience.
                </p>
                
                <div class="welcome-actions">
                    @auth
                        <a href="{{ route('products.index') }}" class="btn btn-primary btn-modern">
                            <i class="fas fa-shopping-bag me-2"></i>
                            Start Shopping
                        </a>
                    @else
                        <a href="{{ route('login.view') }}" class="btn btn-primary btn-modern">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Sign In
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Image Section -->
            <div class="col-lg-6 text-center">
                <div class="image-wrapper">
                    <div class="image-decoration"></div>
                    <img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092" 
                         class="welcome-image" 
                         alt="Restaurant Interior">
                    <div class="image-float float-1">
                        <i class="fas fa-pizza-slice"></i>
                    </div>
                    <div class="image-float float-2">
                        <i class="fas fa-coffee"></i>
                    </div>
                    <div class="image-float float-3">
                        <i class="fas fa-hamburger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #ff6b35;
        --secondary-color: #f7931e;
        --accent-color: #ffe66d;
        --dark-color: #2c3e50;
        --light-bg: #f8f9fa;
        --gradient: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        --shadow: 0 10px 30px rgba(0,0,0,0.1);
        --shadow-hover: 0 20px 50px rgba(0,0,0,0.15);
    }

    .welcome-container {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        min-height: 100vh;
        position: relative;
        overflow: hidden;
    }

    .welcome-container::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 800px;
        height: 800px;
        background: linear-gradient(45deg, rgba(255, 107, 53, 0.05), rgba(247, 147, 30, 0.05));
        border-radius: 50%;
        z-index: 0;
    }

    .container {
        position: relative;
        z-index: 1;
    }

    /* Welcome Badge */
    .welcome-badge {
        display: inline-block;
        background: rgba(255, 107, 53, 0.1);
        color: var(--primary-color);
        padding: 10px 20px;
        border-radius: 50px;
        border: 2px solid rgba(255, 107, 53, 0.2);
        font-weight: 600;
        margin-bottom: 2rem;
        animation: slideInFromTop 1s ease-out;
    }

    /* Welcome Title */
    .welcome-title {
        font-size: 3.2rem;
        font-weight: 700;
        line-height: 1.2;
        color: var(--dark-color);
        margin-bottom: 1.5rem;
        animation: slideInFromLeft 1s ease-out 0.2s both;
    }

    .text-gradient {
        background: var(--gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Welcome Description */
    .welcome-description {
        font-size: 1.2rem;
        line-height: 1.7;
        color: #6c757d;
        margin-bottom: 2.5rem;
        animation: slideInFromLeft 1s ease-out 0.4s both;
    }

    /* Welcome Actions */
    .welcome-actions {
        animation: slideInFromLeft 1s ease-out 0.6s both;
    }

    .btn-modern {
        padding: 15px 35px;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 50px;
        background: var(--gradient);
        border: none;
        color: white;
        text-decoration: none;
        display: inline-block;
        box-shadow: var(--shadow);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .btn-modern:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-hover);
        color: white;
    }

    .btn-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.6s ease;
    }

    .btn-modern:hover::before {
        left: 100%;
    }

    /* Image Section */
    .image-wrapper {
        position: relative;
        display: inline-block;
        animation: slideInFromRight 1s ease-out 0.3s both;
    }

    .image-decoration {
        position: absolute;
        top: -20px;
        left: -20px;
        right: 20px;
        bottom: 20px;
        background: var(--gradient);
        border-radius: 20px;
        z-index: -1;
        opacity: 0.1;
        animation: rotateIn 1s ease-out 0.8s both;
    }

    .welcome-image {
        width: 100%;
        max-width: 500px;
        height: auto;
        border-radius: 20px;
        box-shadow: var(--shadow-hover);
        transition: all 0.5s ease;
    }

    .welcome-image:hover {
        transform: scale(1.02);
        box-shadow: 0 25px 60px rgba(0,0,0,0.2);
    }

    /* Floating Elements */
    .image-float {
        position: absolute;
        width: 60px;
        height: 60px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: var(--primary-color);
        box-shadow: var(--shadow);
        animation: float 3s ease-in-out infinite;
    }

    .float-1 {
        top: 15%;
        left: -5%;
        animation-delay: 0s;
    }

    .float-2 {
        top: 25%;
        right: -5%;
        animation-delay: 1s;
    }

    .float-3 {
        bottom: 20%;
        left: 10%;
        animation-delay: 2s;
    }

    /* Animations */
    @keyframes slideInFromTop {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInFromLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInFromRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes rotateIn {
        from {
            opacity: 0;
            transform: rotate(-45deg) scale(0.5);
        }
        to {
            opacity: 0.1;
            transform: rotate(0deg) scale(1);
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-15px);
        }
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .welcome-title {
            font-size: 2.5rem;
            text-align: center;
        }
        
        .welcome-description {
            text-align: center;
            font-size: 1.1rem;
        }
        
        .welcome-actions {
            text-align: center;
        }
        
        .image-wrapper {
            margin-top: 3rem;
        }
    }

    @media (max-width: 768px) {
        .welcome-title {
            font-size: 2.2rem;
        }
        
        .welcome-description {
            font-size: 1rem;
        }
        
        .btn-modern {
            padding: 12px 30px;
            font-size: 1rem;
        }
        
        .image-float {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }
    }

    @media (max-width: 576px) {
        .welcome-title {
            font-size: 1.8rem;
        }
        
        .image-float {
            display: none;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effect to floating elements
    const floatingElements = document.querySelectorAll('.image-float');
    
    floatingElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.1)';
            this.style.transition = 'all 0.3s ease';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Smooth entrance for elements
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    }, observerOptions);

    // Observe all animated elements
    document.querySelectorAll('[class*="slide"], [class*="float"]').forEach(el => {
        observer.observe(el);
    });
});
</script>
@endsection