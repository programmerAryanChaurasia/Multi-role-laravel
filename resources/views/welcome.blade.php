{{-- @extends('layouts.master')

@section('title', 'Sembark - URL Shortener')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-primary text-white py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">
                        Shorten URLs with <span class="text-warning">Sembark</span>
                    </h1>
                    <p class="lead mb-4">
                        Create short, memorable URLs for your business. Track clicks, manage teams, 
                        and streamline your sharing experience.
                    </p>
                    <div class="d-flex gap-3">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg">
                                <i class="fas fa-tachometer-alt me-2"></i>Go to Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-warning btn-lg">
                                <i class="fas fa-rocket me-2"></i>Get Started Free
                            </a>
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Sign In
                            </a>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/1005/1005141.png" 
                         alt="URL Shortener" class="img-fluid" style="max-height: 400px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Powerful Features</h2>
                <p class="text-muted">Everything you need to manage your URLs effectively</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-hover h-100 text-center p-4">
                        <div class="feature-icon mx-auto text-white">
                            <i class="fas fa-link fa-2x"></i>
                        </div>
                        <h5>URL Shortening</h5>
                        <p class="text-muted">Create short, branded URLs that are easy to share and remember.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card card-hover h-100 text-center p-4">
                        <div class="feature-icon mx-auto text-white">
                            <i class="fas fa-chart-bar fa-2x"></i>
                        </div>
                        <h5>Analytics</h5>
                        <p class="text-muted">Track click-through rates and monitor your URL performance.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card card-hover h-100 text-center p-4">
                        <div class="feature-icon mx-auto text-white">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <h5>Team Management</h5>
                        <p class="text-muted">Invite team members and manage permissions with ease.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection --}}


@extends('layouts.master')

@section('title', 'Sembark - URL Shortener for Travel Businesses')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(135deg, #1e40af 0%, #3730a3 50%, #5b21b6 100%); color: white; padding: 100px 0; position: relative; overflow: hidden;">
        <!-- Background Pattern -->
        <div style="position: absolute; inset: 0; opacity: 0.1; background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.1\"%3E%3Ccircle cx=\"30\" cy=\"30\" r=\"2\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="badge mb-4" style="background: rgba(255,255,255,0.2); color: white; padding: 8px 20px; border-radius: 50px; font-size: 14px; display: inline-block;">
                        <i class="fas fa-rocket text-warning me-2"></i>
                        Travel Technology Solution
                    </div>
                    
                    <h1 class="display-4 fw-bold mb-4" style="line-height: 1.2;">
                        Enhance and Scale Your Travel Business with 
                        <span class="text-warning">Sembark URL Shortener</span>
                    </h1>
                    
                    <p class="lead mb-4" style="font-size: 1.25rem; color: #e2e8f0;">
                        Streamlined Operations + Increased Productivity + Enhanced Efficiency + Improved Client Satisfaction
                    </p>
                    
                    <div class="d-flex flex-column flex-sm-row gap-3 mb-5">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg px-5 py-3 fw-semibold" style="border-radius: 12px; transition: all 0.3s ease;">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                Go to Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-warning btn-lg px-5 py-3 fw-semibold" style="border-radius: 12px; transition: all 0.3s ease;">
                                <i class="fas fa-play-circle me-2"></i>
                                Get Started Free
                            </a>
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-5 py-3 fw-semibold" style="border-radius: 12px; border-width: 2px; transition: all 0.3s ease;">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Sign In
                            </a>
                        @endauth
                    </div>
                    
                    <!-- Trust Badges -->
                    <div class="mt-5">
                        <p class="text-light mb-3" style="opacity: 0.8; font-size: 0.9rem;">TRUSTED BY TRAVEL BUSINESSES WORLDWIDE</p>
                        <div class="d-flex flex-wrap align-items-center gap-4" style="opacity: 0.9;">
                            <div class="fw-bold text-white">Neptune Holidays</div>
                            <div class="fw-bold text-white">Clubside</div>
                            <div class="fw-bold text-white">Andaman Experts</div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 text-center">
                    <div class="position-relative">
                        <!-- Main Illustration -->
                        <div class="bg-white rounded-3 p-4 shadow-lg" style="transform: rotate(3deg); transition: transform 0.5s ease; display: inline-block;">
                            <img src="https://cdn-icons-png.flaticon.com/512/1005/1005141.png" 
                                 alt="Sembark URL Shortener" class="img-fluid" style="max-width: 300px;">
                        </div>
                        
                        <!-- Floating Elements -->
                        <div class="position-absolute top-0 start-0 bg-warning rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 60px; height: 60px; transform: translate(-20%, -20%);">
                            <i class="fas fa-link text-dark fs-4"></i>
                        </div>
                        <div class="position-absolute bottom-0 end-0 bg-success rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 50px; height: 50px; transform: translate(20%, 20%);">
                            <i class="fas fa-chart-line text-white fs-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Wave Divider -->
        <div class="position-absolute bottom-0 start-0 w-100">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-100" style="height: 60px; fill: white;">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <span class="text-primary fw-semibold text-uppercase" style="letter-spacing: 1px;">POWERFUL FEATURES</span>
                <h2 class="display-5 fw-bold text-dark mt-2 mb-4">
                    Everything You Need to Manage URLs Effectively
                </h2>
                <p class="lead text-muted mx-auto" style="max-width: 600px;">
                    Designed specifically for travel businesses to streamline operations and enhance client communication
                </p>
            </div>
            
            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-card" style="border-radius: 20px; transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="feature-icon mb-4" style="width: 70px; height: 70px; background: linear-gradient(135deg, #3b82f6, #6366f1); border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-link text-white fs-3"></i>
                            </div>
                            <h3 class="h4 fw-bold text-dark mb-3">Smart URL Shortening</h3>
                            <p class="text-muted mb-4">
                                Create branded, memorable short URLs that reflect your travel business identity and enhance client trust.
                            </p>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Custom branded domains
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Bulk URL shortening
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    QR code generation
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Feature 2 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-card" style="border-radius: 20px; transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="feature-icon mb-4" style="width: 70px; height: 70px; background: linear-gradient(135deg, #10b981, #059669); border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-chart-bar text-white fs-3"></i>
                            </div>
                            <h3 class="h4 fw-bold text-dark mb-3">Advanced Analytics</h3>
                            <p class="text-muted mb-4">
                                Track engagement with real-time analytics. Understand what resonates with your travel clients.
                            </p>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Real-time click tracking
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Geographic insights
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Device & browser analytics
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Feature 3 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-card" style="border-radius: 20px; transition: all 0.3s ease;">
                        <div class="card-body p-4">
                            <div class="feature-icon mb-4" style="width: 70px; height: 70px; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-users text-white fs-3"></i>
                            </div>
                            <h3 class="h4 fw-bold text-dark mb-3">Team Collaboration</h3>
                            <p class="text-muted mb-4">
                                Perfect for travel agencies and DMCs. Manage team permissions and streamline client communication.
                            </p>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Role-based access
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Company-wide management
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Secure invitation system
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Additional Features -->
            <div class="row mt-5">
                <div class="col-md-3 text-center mb-4">
                    <div class="icon-box mx-auto mb-3" style="width: 60px; height: 60px; background: #dbeafe; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-shield-alt text-primary fs-5"></i>
                    </div>
                    <h5 class="fw-semibold text-dark mb-2">Enhanced Security</h5>
                    <p class="text-muted small">Bank-level security for all your shortened URLs</p>
                </div>
                
                <div class="col-md-3 text-center mb-4">
                    <div class="icon-box mx-auto mb-3" style="width: 60px; height: 60px; background: #dcfce7; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-sync-alt text-success fs-5"></i>
                    </div>
                    <h5 class="fw-semibold text-dark mb-2">Streamlined Workflows</h5>
                    <p class="text-muted small">Integrate seamlessly with your existing processes</p>
                </div>
                
                <div class="col-md-3 text-center mb-4">
                    <div class="icon-box mx-auto mb-3" style="width: 60px; height: 60px; background: #f3e8ff; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-expand-arrows-alt text-purple fs-5"></i>
                    </div>
                    <h5 class="fw-semibold text-dark mb-2">Scalability</h5>
                    <p class="text-muted small">Grow from startup to enterprise effortlessly</p>
                </div>
                
                <div class="col-md-3 text-center mb-4">
                    <div class="icon-box mx-auto mb-3" style="width: 60px; height: 60px; background: #ffedd5; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-headset text-orange fs-5"></i>
                    </div>
                    <h5 class="fw-semibold text-dark mb-2">Dedicated Support</h5>
                    <p class="text-muted small">24/7 support for travel businesses</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5" style="background: linear-gradient(135deg, #1e40af 0%, #3730a3 100%); color: white;">
        <div class="container text-center">
            <h2 class="display-6 fw-bold mb-4">
                Ready to Transform Your Travel Business Communication?
            </h2>
            <p class="lead mb-5 mx-auto" style="max-width: 600px; color: #e2e8f0;">
                Join hundreds of travel agencies, tour operators, and DMCs using Sembark to streamline their URL management and enhance client satisfaction.
            </p>
            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg px-5 py-3 fw-semibold" style="border-radius: 12px;">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-warning btn-lg px-5 py-3 fw-semibold" style="border-radius: 12px;">
                        <i class="fas fa-play-circle me-2"></i>
                        Start Free Trial
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-5 py-3 fw-semibold" style="border-radius: 12px; border-width: 2px;">
                        <i class="fas fa-sign-in-alt me-2"></i>
                        Sign In to Account
                    </a>
                @endauth
            </div>
            <p class="text-light mt-4 mb-0" style="opacity: 0.8;">
                No credit card required • Free 14-day trial • Setup in minutes
            </p>
        </div>
    </section>
@endsection

@push('styles')
<style>
.hover-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
}

.hero-section .card:hover {
    transform: rotate(0deg);
}

.feature-icon {
    transition: transform 0.3s ease;
}

.hover-card:hover .feature-icon {
    transform: scale(1.1);
}

.icon-box {
    transition: transform 0.3s ease;
}

.icon-box:hover {
    transform: scale(1.1);
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}
</style>
@endpush