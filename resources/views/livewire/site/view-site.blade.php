<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <label for="company" class="form-label">Company Name</label>
        <input type="text" id="company" class="form-control @error('company') is-invalid @enderror" value="{{ $site->company }}" readonly>
        @error('company') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="website_name" class="form-label">Site Name</label>
        <input type="text" id="website_name" class="form-control @error('website_name') is-invalid @enderror" value="{{ $site->website_name }}" readonly>
        @error('website_name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="url" class="form-label">URL</label>
        <input type="text" id="url" class="form-control @error('url') is-invalid @enderror" value="{{ $site->url }}" readonly>
        @error('url') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="contact_person" class="form-label">Contact Person</label>
        <input type="text" id="contact_person" class="form-control @error('contact_person') is-invalid @enderror" value="{{ $site->contact_person }}" readonly>
        @error('contact_person') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="contact_number" class="form-label">Contact Number</label>
        <input type="text" id="contact_number" class="form-control @error('contact_number') is-invalid @enderror" value="{{ $site->contact_number }}" readonly>
        @error('contact_number') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"  value="{{ $site->email }}" readonly>
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label for="website_logo" class="form-label">Website Logo</label>
        <div class="border rounded p-3 text-center shadow-sm bg-light">
            @if ($site->logo)
                <img src="{{ asset('storage/' . $site->logo) }}" alt="Website Logo for {{ $site->website_name }}" class="img-fluid" style="max-height: 150px;">
            @else
                <p class="text-muted">No logo uploaded.</p>
            @endif
        </div>
    </div>
    
    <div class="mb-4">
        <label for="theme" class="form-label">Website Theme</label>
        <div class="border rounded p-3 text-center shadow-sm bg-light">
            @if ($site->theme)
                <img src="{{ asset('storage/' . $site->theme->preview) }}" alt="Theme Preview for {{ $site->website_name }}" class="img-fluid mb-2" style="max-height: 150px;">
                <h5 class="mt-2 text-success">{{ $site->theme->name }}</h5>
            @else
                <p class="text-muted">No theme selected.</p>
            @endif
        </div>
    </div>
    

    <div class="mb-3">
        <label for="modules" class="form-label">Modules</label>
        
        <div class="d-flex flex-wrap gap-2 mt-2">
            @foreach ($site->modules as $module)
                <span class="badge bg-primary">{{ $module->name }}</span>
            @endforeach
        </div>
    </div>
</div>
