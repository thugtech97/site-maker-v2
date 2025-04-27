<div>
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session()->has('warning'))
        <div class="alert alert-warning">{{ session('warning') }}</div>
    @endif

    <div class="row">
        @foreach ($sites as $site)
            <div class="col-md-4 mb-4" wire:key="site-{{ $site->id }}">
                <div class="card shadow-sm">
                    <!-- Display the website logo -->
                    <div class="position-relative">
                        @if ($site->logo)
                            <img src="{{ asset('storage/' . $site->logo) }}" 
                                style="height: 200px; object-fit: cover;" 
                                class="card-img-top" 
                                alt="Logo for {{ $site->website_name }}">
                        @else
                            <img src="{{ asset('images/default-logo.png') }}" 
                                style="height: 200px; object-fit: cover;" 
                                class="card-img-top" 
                                alt="Default logo">
                        @endif
                        <!-- Status Sticker -->
                        <span class="status-sticker {{ $site->status == 'BUILT' ? 'bg-success' : 'bg-warning' }}">
                            {{ $site->status }}
                        </span>
                    </div>

                    <div class="card-body">
                        <a href="{{ route('sites.show', ['site' => $site->id]) }}">
                            <h5 class="card-title text-primary">{{ $site->website_name }}</h5>
                        </a>
                        <p class="card-text">
                            <strong>URL:</strong> <a href="https://www.{{ $site->url }}" target="_blank">{{ $site->url }}</a><br>
                            <strong>Created On:</strong> {{ $site->created_at->format('M d, Y') }}
                        </p>

                        <!-- Edit Site Button -->
                        <a href="{{ route('sites.edit', $site->id) }}" class="btn btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <!-- Delete Button -->
                        <button type="button" class="btn btn-sm" onclick="confirmDelete({{ $site->id }})">
                            <i class="fa fa-trash"></i> Delete
                        </button>

                        <!-- Build Button (Visible for DRAFT sites only) -->
                        @if ($site->status === 'DRAFT')
                            <button type="button" wire:click="build({{ $site->id }})" wire:loading.attr="disabled" class="btn btn-sm me-2">
                                <i class="fa fa-hammer"></i> Build
                            </button>
                            <div wire:loading wire:target="build({{ $site->id }})">
                                <div class="spinner-border text-success" style="width: 1rem; height: 1rem;" role="status">
                                    <span class="visually-hidden">Building...</span>
                                </div>
                            </div>
                        
                        @endif

                        <!-- Launch Button -->
                        @if ($site->status === 'BUILT')
                            <a 
                                href="{{ env('APP_URL') }}/wsi-sites/created-sites/{{ Str::slug($site->website_name) }}/public"
                                target="_blank"
                                class="btn btn-sm">
                                <i class="fa fa-play"></i> Launch
                            </a>
                            <button type="button" wire:click="rebuild({{ $site->id }})" wire:loading.attr="disabled" class="btn btn-sm me-2">
                                <i class="fa fa-hammer"></i> Rebuild
                            </button>
                            <div wire:loading wire:target="rebuild({{ $site->id }})">
                                <div class="spinner-border text-success" style="width: 1rem; height: 1rem;" role="status">
                                    <span class="visually-hidden">Rebuilding...</span>
                                </div>
                            </div>
                    
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

        @if ($sites->isEmpty())
            <div class="col-12 text-center">
                <p>No sites available.</p>
            </div>
        @endif
    </div>

    <!-- Pagination Links -->
    <div class="col-12">
        {{ $sites->links('pagination::bootstrap-5') }}
    </div>
</div>

<script>
    function confirmDelete(siteId) {
        if (confirm("Are you sure you want to delete this site?")) {
            @this.call('delete', siteId);
        }
    }
</script>
