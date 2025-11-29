@extends('layouts.master-layouts')

@section('title', 'Companies - Sembark')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h2">Companies Management</h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
        </div>
    </div>

    <!-- Create Company Form -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create New Company & Invite Founder</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('companies.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Company Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" 
                                           placeholder="Enter company name" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="founder_email" class="form-label">Founder Email *</label>
                                    <input type="email" class="form-control @error('founder_email') is-invalid @enderror" 
                                           id="founder_email" name="founder_email" value="{{ old('founder_email') }}" 
                                           placeholder="Enter founder's email address" required>
                                    @error('founder_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">
                                        An invitation will be sent to this email to join as Company Admin.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i>Create Company & Send Invitation
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Companies List -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">All Companies</h5>
                </div>
                <div class="card-body">
                    @if($companies->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Users</th>
                                        <th>Short URLs</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($companies as $company)
                                    <tr>
                                        <td>
                                            <strong>{{ $company->name }}</strong>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">{{ $company->users_count }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">{{ $company->short_urls_count }}</span>
                                        </td>
                                        <td>
                                            @if($company->users_count > 0)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-warning">No Users</span>
                                            @endif
                                        </td>
                                        <td>{{ $company->created_at->format('M j, Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-primary" 
                                                        data-bs-toggle="modal" data-bs-target="#inviteModal{{ $company->id }}"
                                                        title="Invite User">
                                                    <i class="fas fa-user-plus"></i>
                                                </button>
                                                <a href="{{ route('companies.show', $company) }}" class="btn btn-sm btn-outline-info"
                                                   title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if($company->users_count === 0)
                                                <button type="button" class="btn btn-sm btn-outline-warning"
                                                        data-bs-toggle="modal" data-bs-target="#resendInviteModal{{ $company->id }}"
                                                        title="Resend Founder Invitation">
                                                    <i class="fas fa-envelope"></i>
                                                </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Invitation Modal for additional users -->
                                    <div class="modal fade" id="inviteModal{{ $company->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Invite User to {{ $company->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('invitations.store') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="company_id" value="{{ $company->id }}">
                                                        
                                                        <div class="mb-3">
                                                            <label for="email{{ $company->id }}" class="form-label">Email Address</label>
                                                            <input type="email" class="form-control" id="email{{ $company->id }}" 
                                                                   name="email" placeholder="Enter user email" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="role{{ $company->id }}" class="form-label">Role</label>
                                                            <select class="form-control" id="role{{ $company->id }}" name="role" required>
                                                                <option value="admin">Admin</option>
                                                                <option value="member">Member</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-text">
                                                            An invitation will be sent to this email address.
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Send Invitation</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Resend Founder Invitation Modal -->
                                    @if($company->users_count === 0)
                                    <div class="modal fade" id="resendInviteModal{{ $company->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Resend Founder Invitation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('invitations.resend') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="company_id" value="{{ $company->id }}">
                                                    <div class="modal-body">
                                                        <p>No users have joined this company yet. Resend invitation to the founder?</p>
                                                        <div class="mb-3">
                                                            <label for="resend_email{{ $company->id }}" class="form-label">Founder Email</label>
                                                            <input type="email" class="form-control" id="resend_email{{ $company->id }}" 
                                                                   name="email" placeholder="Enter founder email" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-warning">Resend Invitation</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-building fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No companies found.</p>
                            <p class="text-muted">Create your first company using the form above.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection