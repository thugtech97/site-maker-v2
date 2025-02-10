<div>
    <!-- Display Alert Messages -->
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session()->has('warning'))
        <div class="alert alert-warning">{{ session('warning') }}</div>
    @endif

    <!-- Table for Themes -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Theme Name</th>
                    <th>Preview</th>
                    <th>Path</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($themes as $index => $theme)
                    <tr style="text-align: center;">
                        <td>{{ $theme->id }}</td>
                        <td>{{ $theme->name }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$theme->preview) }}" 
                                 style="width: 150px; height: 150px; object-fit: cover;" 
                                 alt="Theme Preview">
                        </td>                        
                        <td>{{ $theme->path }}</td>
                        <td>
                            <button wire:click="view({{ $theme->id }})" class="btn btn-sm">
                                <i class="fa fa-info-circle"></i>
                            </button>
                            <button wire:click="delete({{ $theme->id }})" class="btn btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No themes available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="col-12">
        {{ $themes->links('pagination::bootstrap-5') }}
    </div>
</div>
