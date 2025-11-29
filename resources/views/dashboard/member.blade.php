<!-- resources/views/dashboard/member.blade.php -->
<div class="row mb-4">
    <div class="col-md-6 offset-md-3">
        <div class="card card-hover bg-primary text-white">
            <div class="card-body text-center">
                <h3>{{ auth()->user()->shortUrls()->count() }}</h3>
                <p class="mb-0">My Short URLs</p>
                <i class="fas fa-link fa-2x mt-2"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Quick Actions</h5>
                <a href="{{ route('short-urls.index') }}" class="btn btn-primary">
                    <i class="fas fa-link me-2"></i>Manage My URLs
                </a>
            </div>
        </div>
    </div>
</div>