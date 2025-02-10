@extends('theme')

@section('title', 'Manage Sites - WSI-SITE-BUILDER')

@section('content')
<div class="content-wrap pb-0" style="z-index: 1;">
    <div class="container">
        <div>
            <h1 class="text-center text-primary mb-4">Manage Sites</h1>
        </div>

        <!-- Livewire Component -->
        @livewire('site.sites-list')
    </div>
</div>
@endsection

@section('pagejs')

@endsection
