@extends('theme')

@section('content')

    <div class="content-wrap pb-0" style="z-index: 1;">

        <div class="container mt-5">

            <!-- What We Do
            ============================================= -->
            <div class="heading-block text-center border-0" data-heading="W">
                <h3>About WSI-SITE-BUILDER</h3>
            </div>
            <div class="row">
                <div class="text-center col-lg-8 offset-lg-2 mb-5">
                    <h3 class="text-rotater font-secondary" data-separator="," data-rotate="fadeInRight" data-speed="3500">
                        WSI-SITE-BUILDER is a Powerful, User-Friendly, and Dynamic Platform for Building and Managing Websites. Create stunning, responsive websites with ease. Perfect for <span class="t-rotate color">Businesses, Startups, Portfolios, E-commerce, Agencies, Blogs, Nonprofits</span> and much more. Build your vision effortlessly with WSI-SITE-BUILDER.
                    </h3>
                </div>

                <div class="clear"></div>
                <!-- Features Columns
                ============================================= -->
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="feature-box media-box fbox-bg">
                            <div class="fbox-media">
                                <a href="#"><img src="{{ asset('business/images/featured/1.jpg') }}" alt="One-Click Website Creation"></a>
                            </div>
                            <div class="fbox-content fbox-content-lg">
                                <h3 class="text-transform-none ls-0 fw-semibold">One-Click Website Creation<span class="subtitle font-secondary fw-light ls-0">Easily create and launch your website with just a click of a button.</span></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="feature-box media-box fbox-bg">
                            <div class="fbox-media">
                                <a href="#"><img src="{{ asset('business/images/featured/2.jpg') }}" alt="Easy Theme Selection"></a>
                            </div>
                            <div class="fbox-content fbox-content-lg">
                                <h3 class="text-transform-none ls-0 fw-semibold">Choose from Multiple Themes<span class="subtitle font-secondary fw-light ls-0">Select from a wide variety of professionally designed themes to match your style.</span></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="feature-box media-box fbox-bg">
                            <div class="fbox-media">
                                <a href="#"><img src="{{ asset('business/images/featured/3.jpg') }}" alt="Fully Customizable Design"></a>
                            </div>
                            <div class="fbox-content fbox-content-lg">
                                <h3 class="text-transform-none ls-0 fw-semibold">100% Customizable<span class="subtitle font-secondary fw-light ls-0">Make your website truly yours with endless customization options.</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- How We Work
        ============================================= -->
        <div class="section bg-transparent">
            <div class="container">
                <div class="heading-block mb-6 text-center border-0" data-heading="W">
                    <h3 class="text-transform-none ls-0">How WSI-SITE-BUILDER Works</h3>
                </div>
            </div>
        
            <!-- How It Works - Carousel
            ============================================= -->
            <div id="oc-features" class="owl-carousel owl-carousel-full image-carousel carousel-widget customjs">
                <div class="oc-item">
                    <div class="row cleafix">
                        <div class="col-xl-8">
                            <img src="{{ asset('business/images/carousel/1.jpg') }}" alt="Choose a Theme">
                        </div>
                        <div class="col-xl-4" style="padding: 20px 0 0 20px;">
                            <h3>Select a Theme</h3>
                            <p>Browse through a variety of professionally designed themes tailored to clients' needs. Choose the one that best suits their vision.</p>
                            <a href="#" class="button-link">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="oc-item">
                    <div class="row cleafix">
                        <div class="col-xl-8">
                            <img src="{{ asset('business/images/carousel/2.jpg') }}" alt="Customize Your Site">
                        </div>
                        <div class="col-xl-4" style="padding: 20px 0 0 20px;">
                            <h3>Site Management</h3>
                            <p>Easily manage a site with admin-panel provided. Adjust pages, write content, and make it uniquely to clients—without any coding required.</p>
                            <a href="#" class="button-link">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="oc-item">
                    <div class="row cleafix">
                        <div class="col-xl-8">
                            <img src="{{ asset('business/images/carousel/3.jpg') }}" alt="Publish Your Site">
                        </div>
                        <div class="col-xl-4" style="padding: 20px 0 0 20px;">
                            <h3>Publish and Go Live</h3>
                            <p>Once they're satisfied with their website, hit the publish button. The site will be live and ready for the world to see, all with just one click!</p>
                            <a href="#" class="button-link">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
@endsection