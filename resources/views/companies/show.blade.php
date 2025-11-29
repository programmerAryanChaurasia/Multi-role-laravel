@extends('layouts.master-layouts')

@section('title', $company->name . ' - Sembark')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h2">{{ $company->name }}</h1>
                    <p class="text-muted mb-0">Company Details</p>
                </div>
                <a href="{{ route('companies.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Companies
                </a>
            </div>
        </div>
    </div>

    <!-- Company Stats -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card card-hover bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3>{{ $company->users->count() }}</h3>
                            <p class="mb-0">Total Users</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-hover bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3>{{ $company->shortUrls->count() }}</h3>
                            <p class="mb-0">Total Short URLs</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-link fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-hover bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3>{{ $company->shortUrls->sum('click_count') }}</h3>
                            <p class="mb-0">Total Clicks</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-mouse fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Users List -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Company Users</h5>
                </div>
                <div class="card-body">
                    @if($company->users->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($company->users as $user)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">{{ $user->name }}</h6>
                                    <small class="text-muted">{{ $user->email }}</small>
                                    <span class="badge 
                                        @if($user->role == 'super_admin') bg-danger
                                        @elseif($user->role == 'admin') bg-warning
                                        @else bg-info @endif ms-2">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </div>
                                <small class="text-muted">{{ $user->created_at->format('M j, Y') }}</small>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-users fa-2x text-muted mb-3"></i>
                            <p class="text-muted">No users in this company.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Recent Short URLs -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Recent Short URLs</h5>
                </div>
                <div class="card-body">
                    @if($company->shortUrls->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($company->shortUrls->take(10) as $url)
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1">
                                            <a href="{{ url($url->short_code) }}" target="_blank" class="text-decoration-none">
                                                {{ url($url->short_code) }}
                                            </a>
                                        </h6>
                                        <small class="text-muted text-truncate d-block" style="max-width: 300px;">
                                            {{ $url->original_url }}
                                        </small>
                                        <small class="text-muted">By: {{ $url->user->name }}</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-primary">{{ $url->click_count }} clicks</span>
                                        <br>
                                        <small class="text-muted">{{ $url->created_at->format('M j') }}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-link fa-2x text-muted mb-3"></i>
                            <p class="text-muted">No short URLs created yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection