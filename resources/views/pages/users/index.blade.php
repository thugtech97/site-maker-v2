@extends('theme')

@section('title', 'Manage Users - WSI-SITE-BUILDER')

@section('content')
<div class="content-wrap pb-0" style="z-index: 1;">
    <div class="container">
        <div>
            <h1 class="text-center text-primary mb-4">Manage Users</h1>
        </div>

        <!-- Livewire Component -->
        @livewire('user.user-list')
    </div>
</div>
@endsection
