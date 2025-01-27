@extends('theme')

@section('title', 'Create a Theme - WSI-SITE-BUILDER')

@section('content')
<div class="content-wrap pb-0" style="z-index: 1;">
    <div class="container mb-4">
        <div>
            <h1 class="text-center text-primary mb-4">Create a Theme</h1>
        </div>
        @livewire('create-theme')
    </div>
</div>
@endsection
