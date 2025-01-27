<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="preview" class="form-label">Preview</label>
            <input type="file" id="preview" class="form-control @error('preview') is-invalid @enderror" wire:model="preview" accept="image/*">
            @error('preview') <span class="text-danger">{{ $message }}</span> @enderror
            
            @if ($preview)
                <div class="mt-3">
                    <img src="{{ $preview->temporaryUrl() }}" alt="Logo Preview" class="img-fluid" style="max-height: 150px;">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="path" class="form-label">Folder name</label>
            <input type="text" id="path" class="form-control @error('path') is-invalid @enderror" wire:model="path">
            @error('path') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Create Theme</button>
        </div>
    </form>
</div>
