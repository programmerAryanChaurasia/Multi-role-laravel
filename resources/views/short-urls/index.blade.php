@extends('layouts.master-layouts')

@section('title', 'Short URLs - Sembark')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h2">
                    @if(auth()->user()->isSuperAdmin())
                        All Short URLs
                    @elseif(auth()->user()->isAdmin())
                        Company Short URLs
                    @else
                        My Short URLs
                    @endif
                </h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('short_url'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Short URL Created!</strong><br>
                    Your short URL is: <a href="{{ session('short_url') }}" target="_blank">{{ session('short_url') }}</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
        </div>
    </div>

    <!-- Create Short URL Form -->
    @if(auth()->user()->isAdmin() || auth()->user()->isMember())
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create New Short URL</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('short-urls.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <label for="original_url" class="form-label">Original URL</label>
                                    <input type="text" class="form-control @error('original_url') is-invalid @enderror" 
                                           id="original_url" name="original_url" value="{{ old('original_url') }}" 
                                           placeholder="url" required>
                                    @error('original_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">&nbsp;</label>
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fas fa-link me-2"></i>Shorten
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Short URLs List -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if($shortUrls->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Short URL</th>
                                        <th>Original URL</th>
                                        @if(auth()->user()->isSuperAdmin())
                                        <th>Company</th>
                                        <th>Created By</th>
                                        @endif
                                        <th>Clicks</th>
                                        <th>Created At</th>
                                        @if(auth()->user()->isAdmin() || auth()->user()->isMember())
                                        <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($shortUrls as $url)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ url($url->short_code) }}" target="_blank" 
                                                   class="text-primary text-decoration-none fw-bold">
                                                    {{ url($url->short_code) }}
                                                </a>
                                                <button onclick="copyToClipboard('{{ url($url->short_code) }}')" 
                                                        class="btn btn-sm btn-outline-secondary ms-2"
                                                        title="Copy to clipboard">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-truncate d-inline-block" style="max-width: 300px;" 
                                                  title="{{ $url->original_url }}">
                                                {{ $url->original_url }}
                                            </span>
                                        </td>
                                        @if(auth()->user()->isSuperAdmin())
                                        <td>{{ $url->company->name }}</td>
                                        <td>{{ $url->user->name }}</td>
                                        @endif
                                        <td>
                                            <span class="badge bg-info">{{ $url->click_count }}</span>
                                        </td>
                                        <td>{{ $url->created_at->format('M j, Y') }}</td>
                                        @if(auth()->user()->isAdmin() || auth()->user()->isMember())
                                        <td>
                                            @if(auth()->user()->isAdmin() || $url->user_id == auth()->id())
                                            <form action="{{ route('short-urls.destroy', $url) }}" method="POST" 
                                                  class="d-inline" onsubmit="return confirm('Are you sure you want to delete this short URL?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-link fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No short URLs found.</p>
                            @if(auth()->user()->isAdmin() || auth()->user()->isMember())
                                <p class="text-muted">Create your first short URL using the form above.</p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show temporary success message
        const btn = event.target;
        const originalHTML = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check"></i>';
        btn.classList.remove('btn-outline-secondary');
        btn.classList.add('btn-outline-success');
        
        setTimeout(() => {
            btn.innerHTML = originalHTML;
            btn.classList.remove('btn-outline-success');
            btn.classList.add('btn-outline-secondary');
        }, 2000);
    }).catch(function(err) {
        console.error('Could not copy text: ', err);
        alert('Failed to copy to clipboard');
    });
}
</script>
@endsection