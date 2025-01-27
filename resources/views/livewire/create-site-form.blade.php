<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <label for="company" class="form-label">Company Name</label>
            <input type="text" id="company" class="form-control @error('company') is-invalid @enderror" wire:model="company">
            @error('company') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="website_name" class="form-label">Site Name</label>
            <input type="text" id="website_name" class="form-control @error('website_name') is-invalid @enderror" wire:model="website_name">
            @error('website_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="text" id="url" class="form-control @error('url') is-invalid @enderror" wire:model="url" placeholder="e.g., example.com">
            @error('url') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="contact_person" class="form-label">Contact Person</label>
            <input type="text" id="contact_person" class="form-control @error('contact_person') is-invalid @enderror" wire:model="contact_person">
            @error('contact_person') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="contact_number" class="form-label">Contact Number</label>
            <input type="text" id="contact_number" class="form-control @error('contact_number') is-invalid @enderror" wire:model="contact_number">
            @error('contact_number') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" wire:model="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="website_logo" class="form-label">Website Logo</label>
            <input type="file" id="website_logo" class="form-control @error('website_logo') is-invalid @enderror" wire:model="website_logo" accept="image/*">
            @error('website_logo') <span class="text-danger">{{ $message }}</span> @enderror
            
            @if ($website_logo)
                <div class="mt-3">
                    <img src="{{ $website_logo->temporaryUrl() }}" alt="Logo Preview" class="img-fluid" style="max-height: 150px;">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="theme_id" class="form-label">Select Theme</label>
            <div id="theme_id" class="d-flex flex-wrap gap-3">
                @if ($themes->isEmpty())
                    <div class="text-muted">No themes available at the moment.</div>
                @else
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
                @endif
            </div>
            @error('theme_id') 
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>           
        
        <div class="mb-3">
            <label for="module_id" class="form-label">Select Modules</label>
            <div id="module_id" class="p-3 border rounded @error('module_ids') is-invalid @enderror">
                <div class="d-flex flex-wrap">
                    @foreach ($modules as $index => $module)
                        <div class="form-check" style="width: 33.33%; margin-bottom: 10px;">
                            <input 
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

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Create Site</button>
        </div>
    </form>
    
</div>
