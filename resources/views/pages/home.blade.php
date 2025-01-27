@extends('theme')

@section('title', 'Home - WSI-SITE-BUILDER')

@section('content')
<div class="content-wrap pb-0" style="z-index: 1;">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-4 animated fadeInUp">
            <h1 class="display-4 text-primary">Welcome to WSI-SITE-BUILDER</h1>
            <p class="lead">Empowering non-IT professionals to create stunning websites for their clients without the need for technical expertise.</p>
        </div>

        <!-- About Section -->
        <div class="row mb-5">
            <div class="col-lg-6 animated fadeInLeft">
                <h2 class="h3 mb-3">What is WSI-SITE-BUILDER?</h2>
                <p>WSI-SITE-BUILDER is a user-friendly website creation platform designed specifically for non-IT professionals. It empowers marketing teams, business owners, and other non-technical users to build and set up websites for their clients, all without requiring any coding or technical skills.</p>
                <p>Whether you're managing a business, a marketing campaign, or helping clients establish an online presence, WSI-SITE-BUILDER gives you the tools to create a professional website quickly and easily. You can design, customize, and launch a fully functional website — all with a few clicks.</p>
            </div>
            <div class="col-lg-6 animated fadeInRight">
                <img src="{{ asset('images/1.jpg') }}" alt="WSI-SITE-BUILDER" class="img-fluid rounded shadow">
            </div>
        </div>

        <!-- Features Section -->
        <div class="row">
            <div class="col-md-4 mb-4 animated fadeInUp">
                <div class="card shadow-sm border-light">
                    <div class="card-body">
                        <h5 class="card-title">No Technical Skills Required</h5>
                        <p class="card-text">WSI-SITE-BUILDER is designed for non-IT personnel, so you don’t need any coding knowledge to create a professional website for your clients.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 animated fadeInUp delay-1s">
                <div class="card shadow-sm border-light">
                    <div class="card-body">
                        <h5 class="card-title">Admin Panel for Easy Site Customization</h5>
                        <p class="card-text">Created site comes with a fully-featured admin panel that makes it easy to customize your site. You can add new pages, edit content, update images, and adjust settings — all through an intuitive interface, without needing any technical skills.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 animated fadeInUp delay-2s">
                <div class="card shadow-sm border-light">
                    <div class="card-body">
                        <h5 class="card-title">Client-Focused Templates</h5>
                        <p class="card-text">Choose from a variety of industry-specific templates, and customize them to meet your client's needs — no design experience required.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- How It Works Section -->
        <div class="row my-5">
            <div class="col-lg-12">
                <h3 class="h4 text-center mb-4 animated fadeInUp">How It Works</h3>
                <div class="text-center animated fadeInUp delay-0.5s">
                    <p>WSI-SITE-BUILDER simplifies the website creation process into three easy steps:</p>
                    <ol class="list-unstyled">
                        <li><strong>Step 1:</strong> Choose a template that best suits your client’s business.</li>
                        <li><strong>Step 2:</strong> Customize the template with your content, logo, and branding.</li>
                        <li><strong>Step 3:</strong> Publish and launch the website — it's that simple!</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="text-center my-5 animated fadeInUp">
            <h3 class="h4 mb-3">Ready to Build a Website for Your Client?</h3>
            <p class="mb-4">Get started today and create a professional, fully-functional website without needing IT assistance.</p>
            <a href="#" class="btn btn-primary btn-lg">Start Building Now</a>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fadeInUp {
        animation: fadeInUp 1s ease-out forwards;
    }

    .fadeInUp.delay-0.5s {
        animation-delay: 0.5s;
    }

    .fadeInUp.delay-1s {
        animation-delay: 1s;
    }

    .fadeInUp.delay-2s {
        animation-delay: 2s;
    }

    .fadeInLeft {
        animation: fadeInLeft 1s ease-out forwards;
    }

    .fadeInRight {
        animation: fadeInRight 1s ease-out forwards;
    }

    @keyframes fadeInLeft {
        0% {
            opacity: 0;
            transform: translateX(-20px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInRight {
        0% {
            opacity: 0;
            transform: translateX(20px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>
@endsection
