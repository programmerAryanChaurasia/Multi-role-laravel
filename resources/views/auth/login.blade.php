{{-- @extends('layouts.master')

@section('title', 'Login - Sembark')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card card-hover border-0 shadow">
                <div class="card-body p-5">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <div class="feature-icon mx-auto mb-3">
                            <i class="fas fa-sign-in-alt fa-2x text-white"></i>
                        </div>
                        <h2 class="fw-bold">Welcome Back</h2>
                        <p class="text-muted">Sign in to your Sembark account</p>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" 
                                       placeholder="Enter your email" required autofocus>
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                            <i class="fas fa-sign-in-alt me-2"></i>Sign In
                        </button>

                        <!-- Register Link -->
                        <div class="text-center">
                            <p class="text-muted">Don't have an account? 
                                <a href="{{ route('register') }}" class="text-decoration-none fw-bold">
                                    Create one here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.master')

@section('title', 'Login - Sembark')

@section('content')
<!-- Login Section with Sembark Branding -->
<section class="login-section min-vh-100 d-flex align-items-center" style="background: linear-gradient(135deg, #1e40af 0%, #3730a3 50%, #5b21b6 100%); position: relative; overflow: hidden;">
    <!-- Background Pattern -->
    <div class="position-absolute w-100 h-100" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.05\"%3E%3Ccircle cx=\"30\" cy=\"30\" r=\"2\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    
    <!-- Left Side - Branding -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 d-none d-lg-flex align-items-center justify-content-center text-white p-5">
                <div class="brand-content text-center">
                    <!-- Sembark Logo -->
                    <div class="mb-5">
                        <img src="https://assets.sembark.com/images/logos/logo_512x512.png" alt="Sembark" class="mb-4" style="width: 80px; height: 80px; border-radius: 20px;">
                        <h1 class="display-4 fw-bold">Sembark</h1>
                        <p class="lead mb-4" style="color: #e2e8f0;">Travel Software for Travel Agencies, Tour Operators and DMC</p>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="trust-indicators">
                        <p class="text-uppercase small mb-3" style="color: #cbd5e1; letter-spacing: 2px;">Trusted by Travel Businesses Worldwide</p>
                        <div class="d-flex justify-content-center align-items-center gap-4 flex-wrap">
                            <div class="text-center">
                                <div class="fw-bold fs-5">Neptune Holidays</div>
                            </div>
                            <div class="text-center">
                                <div class="fw-bold fs-5">Clubside</div>
                            </div>
                            <div class="text-center">
                                <div class="fw-bold fs-5">Andaman Experts</div>
                            </div>
                        </div>
                    </div>

                    <!-- Features List -->
                    <div class="features-list mt-5">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle text-warning me-2"></i>
                                    <small>Streamlined Operations</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle text-warning me-2"></i>
                                    <small>Enhanced Efficiency</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle text-warning me-2"></i>
                                    <small>Increased Productivity</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle text-warning me-2"></i>
                                    <small>Client Satisfaction</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="col-xl-4 col-lg-6 col-md-8">
                <div class="card border-0 shadow-lg rounded-3" style="backdrop-filter: blur(10px); background: rgba(255, 255, 255, 0.95);">
                    <div class="card-body p-5">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <div class="login-icon mb-4">
                                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #3b82f6, #6366f1); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="fas fa-sign-in-alt text-white fs-3"></i>
                                </div>
                            </div>
                            <h2 class="fw-bold text-dark mb-2">Welcome Back</h2>
                            <p class="text-muted">Sign in to your Sembark account</p>
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Invalid credentials. Please try again.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold text-dark">Email Address</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" 
                                           placeholder="Enter your email" required autofocus
                                           style="border-radius: 0 8px 8px 0;">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block mt-2">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold text-dark">Password</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" 
                                           id="password" name="password" placeholder="Enter your password" required
                                           style="border-radius: 0 8px 8px 0;">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block mt-2">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label text-muted" for="remember">Remember me</label>
                                </div>
                                
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 py-3 mb-4 fw-semibold fs-5 rounded-2" 
                                    style="background: linear-gradient(135deg, #3b82f6, #6366f1); border: none; transition: all 0.3s ease;">
                                <i class="fas fa-sign-in-alt me-2"></i>Sign In to Sembark
                            </button>
                        </form>

                        <!-- Support Links -->
                        <div class="text-center pt-4 border-top">
                            <p class="text-muted mb-3">Need help accessing your account?</p>
                            <div class="d-flex justify-content-center gap-4">
                                <a href="mailto:contact@sembark.com" class="text-decoration-none text-primary fw-semibold">
                                    <i class="fas fa-envelope me-1"></i>Contact Support
                                </a>
                                <a href="https://sembark.statuspage.io" target="_blank" class="text-decoration-none text-primary fw-semibold">
                                    <i class="fas fa-server me-1"></i>System Status
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile Branding -->
                <div class="text-center mt-4 d-lg-none">
                    <div class="text-white">
                        <img src="https://assets.sembark.com/favicons/favicon.png" alt="Sembark" class="mb-2" style="width: 40px; height: 40px;">
                        <h5 class="fw-bold">Sembark</h5>
                        <p class="small" style="color: #e2e8f0;">Travel Software for Travel Businesses</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.login-section {
    min-height: 100vh;
}

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3) !important;
}

.input-group-text {
    border-radius: 8px 0 0 8px !important;
}

.form-control {
    border-radius: 0 8px 8px 0 !important;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
}

.trust-indicators {
    opacity: 0.9;
}

.features-list small {
    color: #e2e8f0;
    font-weight: 500;
}

/* Responsive adjustments */
@media (max-width: 991.98px) {
    .login-section {
        padding: 40px 0;
    }
    
    .brand-content {
        padding: 20px;
    }
}

/* Loading animation for button */
.btn-primary:active {
    transform: scale(0.98);
}

/* Smooth transitions */
* {
    transition: all 0.2s ease-in-out;
}
</style>
@endpush