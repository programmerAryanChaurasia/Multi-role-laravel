<!-- resources/views/dashboard/admin.blade.php -->
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card card-hover bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3>{{ \App\Models\User::where('company_id', auth()->user()->company_id)->count() }}</h3>
                        <p class="mb-0">Company Users</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-hover bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3>{{ \App\Models\ShortUrl::where('company_id', auth()->user()->company_id)->count() }}</h3>
                        <p class="mb-0">Company Short URLs</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-link fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Quick Actions</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('short-urls.index') }}" class="btn btn-primary">
                        <i class="fas fa-link me-2"></i>Manage Short URLs
                    </a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#inviteModal">
                        <i class="fas fa-user-plus me-2"></i>Invite User
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Invite Modal -->
<div class="modal fade" id="inviteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Invite User to Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('invitations.company.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="member">Member</option>
                        </select>
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