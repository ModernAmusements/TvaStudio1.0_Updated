<header>
    <!-- Header Logo -->
    <div class="header-logo">
        <a href="{{ route('shop.home.index') }}">
            två studio
            {{-- <svg class="tva-desktop" viewBox="0 0 211 26" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 3.18098H10.2484V24.6717H14.1925V3.18098H24.441V0.541228H0V3.18098Z"  />
                <path d="M52.2084 0.541228H47.8916L38.6369 22.0319L29.3823 0.541228H25.0655L35.7798 24.6717H41.4941L52.2084 0.541228Z"  />
                <path d="M73.4715 24.6717H77.7882L66.6081 0.541228H59.9621L48.782 24.6717H53.0677L56.5149 17.0009H70.0243L73.4715 24.6717ZM62.7572 3.18098H63.8441L68.8441 14.3611H57.7261L62.7572 3.18098Z"  />
                <path d="M102.671 9.88905C100 9.29899 98.4164 8.49154 98.4164 6.65924C98.4164 4.60955 100.497 3.18098 103.758 3.18098C111.025 3.18098 110.59 8.42943 110.59 8.42943L114.752 7.31141C114.752 7.31141 114.503 0.106445 103.944 0.106445C97.1742 0.106445 94.2238 3.39837 94.2238 7.03191C94.2238 9.92011 96.2425 12.2182 100.373 13.181L106.242 14.5474C109.783 15.3859 111.708 16.0692 111.708 18.3984C111.708 20.3859 109.379 22.0319 105.466 22.0319C96.522 22.0319 97.2673 15.2928 97.2673 15.2928L93.1058 16.504C93.2611 19.7648 96.1493 25.1064 105.559 25.1064C111.398 25.1064 115.901 22.7462 115.901 18.212C115.901 15.0754 114.069 12.4356 108.82 11.2555L102.671 9.88905Z"  />
                <path d="M117.778 9.76483H121.629V18.8332C121.629 23.1499 123.896 25.1064 127.592 25.1064C131.412 25.1064 133.058 22.622 133.058 22.622L132.312 19.858C132.312 19.858 131.381 22.3425 128.368 22.3425C126.381 22.3425 125.356 21.1313 125.356 18.4294V9.76483H132.437V7.43564H125.356V1.03812L121.784 3.52259V7.43564H117.778V9.76483Z"  />
                <path d="M140.208 7.43564H136.481V18.1189C136.481 22.4667 138.593 25.1064 143.717 25.1064C150.301 25.1064 150.736 19.5474 150.736 19.5474L152.319 24.6717H154.121V7.43564H150.394V17.6841C150.394 18.74 149.773 22.3425 145.083 22.3425C141.978 22.3425 140.208 20.945 140.208 18.0568V7.43564Z"  />
                <path d="M173.594 10.6344C173.594 10.6344 172.072 7.00086 167.414 7.00086C162.259 7.00086 158.781 10.7897 158.781 16.0692C158.781 21.3487 162.259 25.1064 167.414 25.1064C172.88 25.1064 174.029 20.5723 174.029 20.5723L175.209 24.6717H177.321V0.541228C177.321 0.541228 175.551 0.882842 173.594 0.882842V10.6344ZM168.594 22.3425C164.93 22.3425 162.756 19.7959 162.756 16.0692C162.756 12.3425 164.93 9.76483 168.594 9.76483C172.321 9.76483 174.371 12.653 174.371 16.0692C174.371 19.4853 172.321 22.3425 168.594 22.3425Z"  />
                <path d="M182.913 24.6717H186.64V7.43564H182.913V24.6717ZM182.913 3.52259H186.64V0.541228H182.913V3.52259Z"  />
                <path d="M191.292 16.0381C191.292 21.1313 194.926 25.1064 201.075 25.1064C207.224 25.1064 210.857 21.1313 210.857 16.0381C210.857 10.976 207.224 7.00086 201.075 7.00086C194.926 7.00086 191.292 10.976 191.292 16.0381ZM195.267 16.0381C195.267 12.3114 197.472 9.76483 201.075 9.76483C204.615 9.76483 206.882 12.3114 206.882 16.0381C206.882 19.7648 204.615 22.3425 201.075 22.3425C197.472 22.3425 195.267 19.7648 195.267 16.0381Z"  />
            </svg> --}}
        </a>
    </div>
    <!-- Search Field -->
    <div class="header-search">
        <form autocomplete="off" role="search" action="{{ route('shop.search.index') }}" method="GET">
            <input type="search" name="term" class="form-sub input-xl" placeholder="{{ ('Suche hier') }}"/>
        </form>
        <svg class="search">
            <use xlink:href="/themes/tva/assets/images/iconsTva.svg#searchIcon"></use>
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
    @guest('customer')
    <div class="nav-login">
        <div class="twa-login-toggle border-l user-menu btn-grid btn-grid-primary">
            <a class="btn-hover">
                <span class="text">{{ ('Anmelden') }}</span>
            </a>
        </div>
    </div>
    @endguest
    @auth('customer')
    <div class="nav-login">
        <div class="twa-login-toggle border-l user-menu btn-grid btn-grid-primary">
            <a class="btn-hover">
                <span class="text">Hi, {{ auth()->guard('customer')->user()->first_name }}</span>
            </a>
        </div>
    </div>
    @endauth
    <!-- Login Panel -->
    <!-- guest -->
    @guest('customer')
    <div class="twa-login-panel account guest">
       <div class="login-panel-heading">
          <div class="btn-close twa-login-toggle">
                Close
          </div>
          <div class="menu-heading">
                Menu
          </div>
       </div>
       <div class="nav-menu">

            <li class="{{ Request::is('/') ? ' active' : '' }}" >
                <a href="/">Home</a>
            </li>

            <li class="{{ Request::is('all') ? ' active' : '' }}" >
                <a href="/all">Shop</a>
            </li>

            <li class="{{ Request::is('archive') ? ' active' : '' }}" >
                <a class="disabled" href="/">Archive</a>
            </li>

            <li class="{{ Request::is('page/about-us') ? ' active' : '' }}" >
                <a href="/page/about-us">Philosophy</a>
            </li>

            <li class="{{ Request::is('page/about-us') ? ' active' : '' }}" >
                <a href="/page/about-us">About</a>
            </li>

            <li class="{{ Request::is('page/about-us') ? ' active' : '' }}" >
                <a href="/page/about-us">Faq</a>
            </li>

            <li class="{{ Request::is('page/about-us') ? ' active' : '' }}" >
                <a href="/page/about-us">Imprint</a>
            </li>

            <li class="{{ Request::is('page/about-us') ? ' active' : '' }}" >
                <a href="/page/about-us">Social</a>
            </li>
       </div>
    <div class="register-area">
        <div class="login-panel-heading p-1">
            <h1 class="single-line">Erstelle dein Konto und werde Teil des Tva-Universums.</h1>
         </div>
        <div class="login-heading-registered">
            <div class="login-heading">Already registered?</div>
            <div class="login-content medium">
                <p>If you are already registered, please log in.</p>
                <ul>
                    <li class="">- Manage Cart</li>
                    <li class="">- Orders</li>
                    <li class="">- Wishlist</li>
                </ul>
            </div>
            <div class="signup-area border-b  border-t btn-grid btn-grid-primary btn-grid-large">
                <a class="btn-hover btn-x-large" href="{{ route('customer.session.index') }}">
                    <span class="text"> {{ __('shop::app.header.sign-in') }}</span>
                </a>
            </div>
        </div>
    <div class="login-heading-sign-up">
        <div class="login-heading">Not yet registered!</div>
        <div class="login-content medium">
            <p>If you are already registered, please log in.</p>
            <ul>
                <li class="">- Order updates</li>
                <li class="">- Personalized</li>
                <li class="">- Save items</li>
            </ul>
        </div>
        <div class="login-area  border-t btn-grid btn-grid-primary btn-grid-large">
            <a class="btn-hover" href="{{ route('customer.register.index') }}">
                <span class="text">{{ __('shop::app.header.sign-up') }}</span>
            </a>
        </div>
    </div>
</div>
    </div>
    @endguest
    <!-- auth -->
    @auth('customer')
    <div class="twa-login-panel account customer">
        <div class="login-panel-heading">
            <div class="twa-login-toggle btn-close">
                  Close
            </div>
            <div class="menu-heading">
                  Menu
            </div>
         </div>
             <div class="nav-menu">
                <li class="{{ Request::is('/') ? ' active' : '' }}" >
                    <a href="/">Home</a>
                </li>

                <li class="{{ Request::is('all') ? ' active' : '' }}" >
                    <a href="/all">Shop</a>
                </li>

                <li class="{{ Request::is('archive') ? ' active' : '' }}" >
                    <a class="disabled" href="">Archive</a>
                </li>

                <li class="{{ Request::is('page/about-us') ? ' active' : '' }}" >
                    <a href="/page/about-us">Philosophy</a>
                </li>

                <li class="{{ Request::is('page/about-us') ? ' active' : '' }}" >
                    <a href="/page/about-us">About</a>
                </li>

                <li class="{{ Request::is('page/about-us') ? ' active' : '' }}" >
                    <a href="/page/about-us">Faq</a>
                </li>

                <li class="{{ Request::is('page/about-us') ? ' active' : '' }}" >
                    <a href="/page/about-us">Imprint</a>
                </li>

                <li class="{{ Request::is('page/about-us') ? ' active' : '' }}" >
                    <a href="/page/about-us">Social</a>
                </li>
        </div>
        <div class="register-area">
            <div class="login-panel-heading">
                <h1 class="single-line">Hey {{ auth()->guard('customer')->user()->first_name }}, nice to see you again</h1>
             </div>
                <div class="nav-menu nav-menu-profile">

                    <li class="{{ Request::is('customer/account/profile') ? ' active' : '' }}" >
                        <a href="/customer/account/profile">Account</a>
                    </li>

                    <li class="{{ Request::is('customer/account/wishlist') ? ' active' : '' }}" >
                        <a href="/customer/account/wishlist">Wishlist</a>
                    </li>

                    <li class="{{ Request::is('checkout/cart') ? ' active' : '' }}" >
                        <a href="/checkout/cart">Cart</a>
                    </li>

                    <li class="{{ Request::is('customer/account/orders') ? ' active' : '' }}" >
                        <a href="/customer/account/orders">Orders</a>
                    </li>

                    </div>
                <div class="login-area border-b border-t btn-grid btn-grid-neutral btn-grid-large">
                    <a class="btn-hover" href="{{ route('customer.session.destroy') }}">
                        <span class="text">{{ __('shop::app.header.logout') }}</span>
                    </a>
                </div>
        </div>
    </div>
    @endauth
      <!-- Nav-Mobile Text -->
    <div id="menu-desktop" class="nav-bar-mobile btn-grid btn-grid-primary">
        <a class="btn-hover">
            <span class="text">Menü</span>
        </a>
    </div>
    <!-- Nav-Mobile Burger  -->
    <div id="menu-mobile" class="nav-bar-mobile">
        <div class="burger">
            <div>
            </div>
        </div>
    </div>
    <!-- Cart bar -->
    <!-- ENTKOPPELT -->
</header>