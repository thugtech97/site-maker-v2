@extends('theme')

@section('title', 'Manage Themes - WSI-SITE-BUILDER')

@section('content')
<div class="content-wrap pb-0" style="z-index: 1;">
    <div class="container">
        <div>
            <h1 class="text-center text-primary mb-4">Manage Themes</h1>
        </div>

        <!-- Livewire Component -->
        @livewire('theme.themes-list')
    </div>
</div>
@endsection
