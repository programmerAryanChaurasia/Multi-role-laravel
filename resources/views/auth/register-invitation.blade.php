{{-- @extends('layouts.master')

@section('title', 'Accept Invitation - Sembark')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card card-hover border-0 shadow">
                <div class="card-body p-5">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <div class="feature-icon mx-auto mb-3">
                            <i class="fas fa-envelope-open-text fa-2x text-white"></i>
                        </div>
                        <h2 class="fw-bold">You're Invited!</h2>
                        <p class="text-muted">Complete your registration to join the team</p>
                        
                        @if(isset($invitation))
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                You're invited as <strong>{{ $invitation->role }}</strong> 
                                for <strong>{{ $invitation->company->name }}</strong>
                            </div>
                        @endif
                    </div>

                    <!-- Invitation Registration Form -->
                    <form method="POST" action="{{ route('register.with.token', $invitation->token) }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" 
                                       placeholder="Enter your full name" required autofocus>
                            </div>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email (Read-only) -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control bg-light" 
                                       id="email" value="{{ $invitation->email }}" readonly>
                                <input type="hidden" name="email" value="{{ $invitation->email }}">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" placeholder="Create your password" required>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" 
                                       id="password_confirmation" name="password_confirmation" 
                                       placeholder="Confirm your password" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 py-2">
                            <i class="fas fa-check-circle me-2"></i>Complete Registration
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.master')

@section('title', 'Accept Invitation - Sembark')

@section('content')
<!-- Invitation Section with Sembark Branding -->
<section class="invitation-section min-vh-100 d-flex align-items-center" style="background: linear-gradient(135deg, #1e40af 0%, #3730a3 50%, #5b21b6 100%); position: relative; overflow: hidden;">
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

                    <!-- Invitation Benefits -->
                    <div class="benefits mt-5 p-4 rounded-3" style="background: rgba(255, 255, 255, 0.1);">
                        <h5 class="fw-bold mb-3">Welcome to the Team!</h5>
                        <div class="text-start">
                            @if(isset($invitation))
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-building text-warning me-3 fs-5"></i>
                                    <div>
                                        <strong>Company:</strong><br>
                                        <span>{{ $invitation->company->name }}</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-user-tie text-warning me-3 fs-5"></i>
                                    <div>
                                        <strong>Your Role:</strong><br>
                                        <span class="text-capitalize">{{ $invitation->role }}</span>
                                    </div>
                                </div>
                            @endif
                            <div class="d-flex align-items-center">
                                <i class="fas fa-rocket text-warning me-3 fs-5"></i>
                                <div>
                                    <strong>Get Started With:</strong><br>
                                    <span>URL Shortening & Team Collaboration</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Invitation Form -->
            <div class="col-xl-4 col-lg-6 col-md-8">
                <div class="card border-0 shadow-lg rounded-3" style="backdrop-filter: blur(10px); background: rgba(255, 255, 255, 0.95);">
                    <div class="card-body p-5">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <div class="invitation-icon mb-4">
                                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="fas fa-envelope-open-text text-white fs-3"></i>
                                </div>
                            </div>
                            <h2 class="fw-bold text-dark mb-2">You're Invited!</h2>
                            <p class="text-muted">Complete your registration to join the team</p>
                            
                            @if(isset($invitation))
                                <div class="alert alert-info border-0 rounded-3" style="background: rgba(59, 130, 246, 0.1); border-left: 4px solid #3b82f6;">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-info-circle text-primary me-2 fs-5"></i>
                                        <div>
                                            You're invited as <strong class="text-capitalize">{{ $invitation->role }}</strong> 
                                            for <strong>{{ $invitation->company->name }}</strong>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Please check the form below for errors.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <!-- Invitation Registration Form -->
                        <form method="POST" action="{{ route('register.with.token', $invitation->token) }}">
                            @csrf

                            <!-- Name -->
                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold text-dark">Full Name</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-user text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control border-start-0 @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" 
                                           placeholder="Enter your full name" required autofocus
                                           style="border-radius: 0 8px 8px 0;">
                                </div>
                                @error('name')
                                    <div class="invalid-feedback d-block mt-2">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Email (Read-only) -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold text-dark">Email Address</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input type="email" class="form-control border-start-0 bg-light" 
                                           id="email" value="{{ $invitation->email }}" readonly
                                           style="border-radius: 0 8px 8px 0;">
                                    <input type="hidden" name="email" value="{{ $invitation->email }}">
                                </div>
                                <div class="form-text text-muted mt-2">
                                    <i class="fas fa-lock me-1"></i>This email is pre-filled from your invitation
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold text-dark">Password</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" 
                                           id="password" name="password" placeholder="Create your password" required
                                           style="border-radius: 0 8px 8px 0;">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block mt-2">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label fw-semibold text-dark">Confirm Password</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control border-start-0" 
                                           id="password_confirmation" name="password_confirmation" 
                                           placeholder="Confirm your password" required
                                           style="border-radius: 0 8px 8px 0;">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 py-3 mb-4 fw-semibold fs-5 rounded-2" 
                                    style="background: linear-gradient(135deg, #8b5cf6, #ec4899); border: none; transition: all 0.3s ease;">
                                <i class="fas fa-check-circle me-2"></i>Complete Registration & Join Team
                            </button>
                        </form>

                        <!-- Security Note -->
                        <div class="text-center mt-4">
                            <small class="text-muted">
                                <i class="fas fa-shield-alt me-1"></i>
                                Your account will be secured with enterprise-grade encryption
                            </small>
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
.invitation-section {
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
    box-shadow: 0 10px 25px rgba(139, 92, 246, 0.3) !important;
}

.input-group-text {
    border-radius: 8px 0 0 8px !important;
}

.form-control {
    border-radius: 0 8px 8px 0 !important;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #8b5cf6;
    box-shadow: 0 0 0 0.2rem rgba(139, 92, 246, 0.25);
}

.form-control[readonly] {
    background-color: #f8f9fa !important;
    border-color: #e9ecef;
    color: #6c757d;
}

.trust-indicators {
    opacity: 0.9;
}

.benefits {
    backdrop-filter: blur(10px);
}

/* Responsive adjustments */
@media (max-width: 991.98px) {
    .invitation-section {
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