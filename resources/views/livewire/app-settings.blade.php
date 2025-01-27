<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <label for="max_site" class="form-label">Max Site</label>
            <input type="number" id="max_site" class="form-control @error('max_site') is-invalid @enderror" wire:model="max_site">
            @error('max_site') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="active_directory" class="form-label">Active Directory</label>
            <input type="text" id="active_directory" class="form-control @error('active_directory') is-invalid @enderror" wire:model="active_directory" placeholder="e.g. E:/wsi-sites">
            @error('active_directory') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Update Settings</button>
        </div>
    </form>
</div>
