<!-- resources/views/dashboard/super-admin.blade.php -->
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card card-hover bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3>{{ \App\Models\Company::count() }}</h3>
                        <p class="mb-0">Total Companies</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-building fa-2x"></i>
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
                        <h3>{{ \App\Models\User::count() }}</h3>
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
        <div class="card card-hover bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3>{{ \App\Models\ShortUrl::count() }}</h3>
                        <p class="mb-0">Total Short URLs</p>
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
                    <a href="{{ route('companies.index') }}" class="btn btn-primary">
                        <i class="fas fa-building me-2"></i>Manage Companies
                    </a>
                    <a href="{{ route('short-urls.index') }}" class="btn btn-success">
                        <i class="fas fa-link me-2"></i>View All URLs
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


