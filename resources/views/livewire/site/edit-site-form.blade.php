<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        @csrf

        <!-- Company Name -->
        <div class="mb-3">
            <label class="form-label">Company Name</label>
            <input type="text" class="form-control @error('company') is-invalid @enderror" wire:model.defer="company">
            @error('company') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Website Name -->
        <div class="mb-3">
            <label class="form-label">Site Name</label>
            <input type="text" class="form-control @error('website_name') is-invalid @enderror" wire:model.defer="website_name" {{ $site->status === "BUILT" ? 'disabled' : '' }}>
            @error('website_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- URL -->
        <div class="mb-3">
            <label class="form-label">URL</label>
            <input type="text" class="form-control @error('url') is-invalid @enderror" wire:model.defer="url" placeholder="e.g., example.com">
            @error('url') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Contact Person -->
        <div class="mb-3">
            <label class="form-label">Contact Person</label>
            <input type="text" class="form-control @error('contact_person') is-invalid @enderror" wire:model.defer="contact_person">
            @error('contact_person') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Contact Number -->
        <div class="mb-3">
            <label class="form-label">Contact Number</label>
            <input type="text" class="form-control @error('contact_number') is-invalid @enderror" wire:model.defer="contact_number">
            @error('contact_number') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.defer="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Website Logo -->
        <div class="mb-3">
            <label class="form-label">Website Logo</label>
            <input type="file" class="form-control @error('website_logo') is-invalid @enderror" wire:model="website_logo" accept="image/*">
            @error('website_logo') <span class="text-danger">{{ $message }}</span> @enderror

            @if ($website_logo)
                <div class="mt-3">
                    <img src="{{ $website_logo->temporaryUrl() }}" class="img-fluid" style="max-height: 150px;">
                </div>
            @elseif ($site->logo)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $site->logo) }}" class="img-fluid" style="max-height: 150px;">
                </div>
            @endif
        </div>

        <!-- Theme selection -->
        <div class="mb-3">
            <label class="form-label">Select Theme</label>
            <div class="d-flex flex-wrap gap-3">
                @foreach ($themes as $theme)
                    <div 
                        class="theme-card {{ $theme_id == $theme->id ? 'selected' : '' }}" 
                        wire:click="$set('theme_id', {{ $theme->id }})"
                    >
                        <input 
                            type="radio" 
                            id="theme_{{ $theme->id }}" 
                            name="theme_id" 
                            value="{{ $theme->id }}" 
                            wire:model="theme_id" 
                            hidden
                        >
                        <label for="theme_{{ $theme->id }}" class="d-flex flex-column align-items-center">
                            <img 
                                src="{{ asset('storage/' . $theme->preview) }}" 
                                alt="{{ $theme->name }}" 
                                class="img-thumbnail" 
                                style="width: 150px; height: 150px; object-fit: cover;"
                            >
                            <span class="mt-2">{{ $theme->name }}</span>
                        </label>
                    </div>
                @endforeach
            </div>
            @error('theme_id') 
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Module selection -->
        <div class="mb-3">
            <label class="form-label">Select Modules</label>
            <div class="p-3 border rounded @error('module_ids') is-invalid @enderror">
                <div class="d-flex flex-wrap">
                    @foreach ($modules as $module)
                        <div class="form-check" style="width: 33.33%; margin-bottom: 10px;">
                            <input
                                disabled
                                type="checkbox" 
                                id="module_{{ $module->id }}" 
                                class="form-check-input" 
                                wire:model="module_ids" 
                                value="{{ $module->id }}"
                            >
                            <label class="form-check-label" for="module_{{ $module->id }}">
                                {{ $module->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            @error('module_ids') 
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Update Site</button>
        </div>
    </form>
</div>
