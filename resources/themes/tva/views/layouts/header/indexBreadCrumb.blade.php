<header>
    <!-- Header Logo -->
    <div class="header-logo">
        <a href="{{ route('shop.home.index') }}">
            @if ($logo = core()->getCurrentChannel()->logo_url)
            <img class="logo" src="{{ $logo }}" />
            @else
            <img class="logo" src="{{ bagisto_asset('images/logo.svg') }}" />
            @endif
        </a>
    </div>
    <!-- Search Field -->
    <div class="header-search">
        <form class="border-r" role="search" action="{{ route('shop.search.index') }}" method="GET">
            <input type="search" name="term" class="form-sub input-xl" placeholder="{{ __('shop::app.header.search-text') }}"/>
        </form>
        <svg class="search">
            <use xlink:href="images/icons/iconsTva.svg#searchIcon"></use>
        </svg>
    </div>
    <?php
        $term = request()->input('term');
        if (! is_null($term)) {
            $serachQuery = 'term='.request()->input('term');
        }
    ?>
    <!-- Warenkorb -->
    @include('shop::checkout.cart.mini-cart')

    <!-- Navbar -->
    <!-- Nav-Desktop-Toggle -->
    <div class="nav-login">
        <div class="twa-login-toggle border-l user-menu btn-grid btn-grid-primary">
            <a class="btn-hover">
                <span class="text">{{ __('shop::app.header.account') }}</span>
            </a>
        </div>
    </div>
    <!-- Login Panel -->
    <!-- guest -->
    @guest('customer')
    <div class="twa-login-panel account guest">
        <div class="login-heading-registered">
            <div class="login-heading">
                <h4 class="single-line">Already registered?</h4>
                <p>If you are already registered, please log in.</p>
                <ul class="border-t-w">
                    <li class="">- Manage Cart</li>
                    <li class="">- Orders</li>
                    <li class="">- Wishlist</li>
                </ul>
            </div>
            <div class="signup-area border-t-w btn-grid btn-grid-primary">
                <a class="btn-hover btn-x-large" href="{{ route('customer.session.index') }}">
                    <span class="text"> {{ __('shop::app.header.sign-in') }}</span>
                </a>
            </div>
        </div>
        <div class="login-heading-sign-up">
        <div class="login-heading">
            <h4 class="single-line">Not yet registered!</h4>
            <p>If you are already registered, please log in.</p>
            <ul class="border-t-w">
                <li class="">- Order delivery updates and return management.</li>
                <li class="">- Personalized recommendations.</li>
                <li class="">- Save items in your Wish List.</li>
            </ul>
        </div>
        <div class="login-area border-l border-t-w btn-grid btn-grid-primary">
            <a class="btn-hover" href="{{ route('customer.register.index') }}">
                <span class=" text">{{ __('shop::app.header.sign-up') }}</span>
            </a>
        </div>
        </div>
    </div>
    @endguest
    <!-- auth -->
    @auth('customer')
    <div class="twa-login-panel account customer">
            <div class="login-panel-heading">
                <h3>
                   Hi, {{ auth()->guard('customer')->user()->first_name }}
                </h3>
            </div>
            <div class="login-panel-content">
                <div class="btn-grid btn-grid-primary">
                    <a class="btn-hover" href="{{ route('customer.profile.index') }}">
                        <span class=" text">{{ __('shop::app.header.profile') }}</span>
                    </a>
                </div>
                <div class="btn-grid btn-grid-primary">
                    <a class="btn-hover" href="{{ route('customer.wishlist.index') }}">
                        <span class=" text">{{ __('shop::app.header.wishlist') }}</span>
                    </a>
                </div>
                <div class="btn-grid btn-grid-primary">
                    <a class="btn-hover" href="{{ route('shop.checkout.cart.index') }}">
                        <span class=" text">{{ __('shop::app.header.cart') }}</span>
                    </a>
                </div>
                <div class="btn-grid btn-grid-primary">
                    <a class="btn-hover" href="{{ route('customer.session.destroy') }}">
                        <span class=" text">{{ __('shop::app.header.logout') }}</span>
                    </a>
                </div>
            </div>
    </div>
    @endauth
      <!-- Nav-Mobile  Text -->
    <div id="menu-desktop" class="nav-bar-mobile  btn-grid btn-grid-primary">
            <a class="btn-hover" href="{{ route('customer.register.index') }}">
                <span class="text">Menü</span>
            </a>
    </div>
    <!-- Nav-Mobile Burger  -->
    <div id="menu-mobile" class="nav-bar-mobile">
        <div class="burger">
            <div></div>
        </div>
    </div>
    <!-- Cart bar -->
    <!-- ENTKOPPELT -->
</header>
<!-- Header CATS -->
{{-- <div class="header-bottom shop-categories" id="header-bottom">

    <div class="categories-heading">
        <h1 class="display">@yield('page_title')</h1>
    </div>

    @include('shop::layouts.header.nav-menu.navmenu')

</div> --}}
@push('scripts')
<script>
 $(document).ready(function() {
    $('body').delegate('.twa-login-toggle, .nav-bar-mobile, .cart, #currentlyAdded, #header-bottom, .footer-newsletter', 'click', function(e) {
        toggleDropdown(e);
    });
    function toggleDropdown(e) {

        var currentElement = $(e.currentTarget);

        if (currentElement.hasClass('twa-login-toggle')) {
            currentElement.toggleClass('is-open');
            $('.twa-login-panel').toggleClass('is-open');
            $('.cart').removeClass('active');
            $('#currentlyAdded').css("display", "none");
        }
        if (currentElement.hasClass('cart')) {
            $('.twa-login-panel').removeClass('is-open');
            $('.nav-bar-mobile').removeClass('is-open');
            $('#currentlyAdded').css("display", "none");
        }
        if (currentElement.hasClass('nav-bar-mobile')) {
            currentElement.toggleClass('is-open');
            $('.twa-login-panel').toggleClass('is-open');
            $('.cart').removeClass('active');
        }

        if (currentElement.hasClass('footer-newsletter')) {
            currentElement.toggleClass('is-open');
            $('.footer-newsletter-panel').toggleClass('is-open');
        }

         if (currentElement.hasClass('header-bottom')) {
             $('.cart').removeClass('active');
             $('.twa-login-panel').removeClass('is-open');
             $('#currentlyAdded').css("display", "none");
         }
    }

    });
</script>
@endpush