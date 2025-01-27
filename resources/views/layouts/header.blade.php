<header id="header" class="full-header {{ Route::currentRouteName() == 'landing' ? 'transparent-header' : ''}} dark header-size-md" data-sticky-class="not-dark" data-responsive-class="not-dark" data-sticky-offset="full" data-sticky-offset-negative="auto">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="{{ route('landing') }}">
                        <img class="logo-default" style="width: 250px; height: auto; margin: 10px;" srcset="{{ asset('images/logo-light.png') }}, {{ asset('images/logo-light.png') }}" src="{{ asset('images/logo-light.png') }}" alt="WSI Logo">
                        <img class="logo-dark" style="width: 250px; height: auto; margin: 10px;" srcset="{{ asset('images/logo-light.png') }}, {{ asset('images/logo-light.png') }}" src="{{ asset('images/logo-light.png') }}" alt="WSI Logo">
                    </a>                    
                </div><!-- #logo end -->

                <div class="header-misc">

                    <!-- Top Search
                    ============================================= -->
                    <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger"><i class="uil uil-search"></i><i class="bi-x-lg"></i></a>
                    </div><!-- #top-search end -->

                </div>

                <div class="primary-menu-trigger">
                    <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                        <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                    </button>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                @if(Route::currentRouteName() !== 'landing')
                    @include('layouts.menu')
                @endif

                <!-- #primary-menu end -->

                <form class="top-search-form" action="search.html" method="get">
                    <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>