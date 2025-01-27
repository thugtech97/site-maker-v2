<section id="slider" class="slider-element swiper_wrapper min-vh-60 min-vh-md-100 include-header" data-loop="true">

    <div class="slider-inner">
        <div class="swiper swiper-parent">
            <div class="swiper-wrapper">
                <div class="swiper-slide dark">
                    <div class="container">
                        <div class="slider-caption slider-caption-center">
                            <div>
                                <h2 class="font-primary text-transform-none">WSI-SITE-BUILDER</h2>
                                <p class="fw-light font-primary d-none d-sm-block">Create effortlessly. Execute with a click.</p>
                                <a href="{{ route('login-form') }}" class="button button-rounded button-large text-transform-none ls-0 font-primary">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide-bg" style="background-image: url('{{ asset('images/1.jpg') }}'); filter: brightness(30%);"></div>
                </div>
            </div>
            <!-- Slider Arrows
            ============================================= -->
            <div class="slider-arrow-left" class="bg-transparent"><i class="bi-arrow-left"></i></div>
            <div class="slider-arrow-right" class="bg-transparent"><i class="bi-arrow-right"></i></div>
        </div>

        <!-- Slider Mouse Icon
        ============================================= -->
        <a href="#" data-scrollto="#content" data-offset="0" class="dark one-page-arrow"><img class="infinite animated fadeInDown" src="{{ asset('business/images/mouse.svg') }}" alt="Image" ></a>
    </div>

</section>