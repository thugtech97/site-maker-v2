@extends('theme')

@section('title', 'Create a Site - WSI-SITE-BUILDER')

@section('pagecss')
@endsection

@section('content')
<div class="content-wrap pb-0" style="z-index: 1;">
    <div class="container mb-4">
        <div>
            <h1 class="text-center text-primary mb-4">Create a Site</h1>
        </div>
        @livewire('site.create-site-form')
    </div>
</div>
@endsection

@section('pagejs')
@endsection
