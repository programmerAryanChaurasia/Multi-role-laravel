@extends('layouts.master-layouts')

@section('title', 'Invitations - Sembark')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h2">Pending Invitations</h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if($invitations->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Company</th>
                                        <th>Sent</th>
                                  
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($invitations as $invitation)
                                    <tr>
                                        <td>{{ $invitation->email }}</td>
                                        <td>
                                            <span class="badge 
                                                @if($invitation->role == 'admin') bg-warning
                                                @else bg-info @endif">
                                                {{ ucfirst($invitation->role) }}
                                            </span>
                                        </td>
                                        <td>{{ $invitation->company->name }}</td>
                                        <td>{{ $invitation->created_at->format('M j, Y') }}</td>
                                    
                                        <td>
                                           
                                            <span class="badge bg-success">Active</span>
                                         
                                        </td>
                                        <td>
                                            <form action="{{ route('invitations.destroy', $invitation) }}" method="POST" 
                                                  class="d-inline" onsubmit="return confirm('Are you sure you want to cancel this invitation?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-times me-1"></i>Cancel
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-envelope fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No pending invitations.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection