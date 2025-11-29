@extends('layouts.master-layouts')

@section('title', 'Dashboard - Sembark')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <h1 class="h2">Dashboard</h1>
            <p class="text-muted">Welcome back, {{ Auth::user()->name }}!</p>
        </div>
    </div>

    <!-- Role-based Dashboard Content -->
    @if(auth()->user()->isSuperAdmin())
        <!-- Super Admin Dashboard -->
        @include('dashboard.super-admin')
    @elseif(auth()->user()->isAdmin())
        <!-- Admin Dashboard -->
        @include('dashboard.admin')
    @else
        <!-- Member Dashboard -->
        @include('dashboard.member')
    @endif
</div>
@endsection