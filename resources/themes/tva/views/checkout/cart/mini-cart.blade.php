@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
<?php $cart = cart()->getCart(); ?> @if ($cart)
<?php $items = $cart->items; ?>
<div class="nav-cart">
    <div class="cart-dropdown-container">
        {{-- <div class="dropdown-toggle cart btn-grid btn-grid-black"> --}}
            <div class="cart-toggle btn-grid btn-grid-black">
            {{-- Cart Toggle + Counter --}}
            <span class="btn-hover name">
                {{ ('Warenkorb') }}
                <span class="count"> ({{ $cart->items->count() }})</span>
            </span>
        </div>
            {{-- currentlyAdded--}}
            <div id="currentlyAdded" class="cart-panel">
                    <div class="dropdown-cart">
                        <div class="dropdown-content cart-item">
                            @foreach ($items as $item)
                            @if($loop->last)
                            <div class="cart-content-added">
                                <div class="cart-content-img">
                                    @php $images = $item->product->getTypeInstance()->getBaseImage($item);
                                    @endphp
                                    <img src="{{ $images['small_image_url'] }}" />
                                </div>
                                <div class="cart-content-info">

                                    <div class="title large">
                                        You have added <strong>{{ $item->name }}</strong> to the cart!
                                    </div>

                                    {{-- Atts --}}

                                    @if (isset($item->additional['attributes']))
                                    <div class="item-options">
                                        @foreach ($item->additional['attributes'] as $attribute)
                                        <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                                        @endforeach
                                    </div>
                                    @endif
                                    {{-- Atts --}}
                                    <div class="price">
                                        <strong>{{ core()->currency($item->base_total) }}
                                        </strong>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            <div class="currentlyAdded-btn">
                                <div class="cart-more  btn-grid btn-grid-primary">
                                    <a class="btn-hover"
                                        href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.minicart.view-cart') }}</a>
                                </div>
                                <div class="cart-continue border-t  btn-grid btn-grid-black">
                                    <a class="btn-hover"
                                        href="{{ route('shop.checkout.onepage.index') }}">{{ __('shop::app.minicart.checkout') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        {{-- Cart panel--}}
        {{-- <div class="dropdown-list cart-panel"> --}}
            <div class="cart-panel">
            <div class="dropdown-container">
                <div class="dropdown-cart">
                    <div class="dropdown-content cart-item">
                        <div class="cart-legend-heading">
                            <div class="btn-close cart-toggle">
                                Close
                          </div>
                          <div class="legend-heading">
                               <h2>Warenkorb</h2>
                          </div>
                        </div>
                        <div class="cart-legend medium">
                            <div class="cart-legend-image">
                                Abbildung
                            </div>
                            <div class="cart-legend-item">
                                Artikel
                            </div>
                            <div class="cart-legend-quantity">
                                Menge
                            </div>
                            <div class="cart-legend-price">
                                Preis
                            </div>
                        </div>
                        @foreach ($items as $item)
                        <div class="cart-content">
                            <div class="cart-content-img">
                                @php $images = $item->product->getTypeInstance()->getBaseImage($item);
                                @endphp
                                <img src="{{ $images['small_image_url'] }}" />
                            </div>
                            <div class="cart-content-info medium">

                                <div class="title">
                                    <h3>{{ $item->name }}</h3>
                                </div>

                                {{-- Atts --}}

                                @if (isset($item->additional['attributes']))
                                <div class="item-options">
                                    @foreach ($item->additional['attributes'] as $attribute)
                                    <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                                    @endforeach
                                </div>
                                @endif
                                {{-- Atts --}}


                                <div class="quantitys">
                                    <p>
                                    Quantity: {{ $item->quantity }}
                                    </p>
                                </div>
                                <div class="price">
                                    <p>
                                    {{ core()->currency($item->base_total) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="mini-cart-cta">
                            <div class="cart-more btn-grid border-b btn-grid-primary">
                                <a class="btn-hover"
                                    href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.minicart.view-cart') }}</a>
                            </div>
                            <div class="cart-continue btn-grid btn-grid-black">
                                <a class="btn-hover"
                                    href="{{ route('shop.checkout.onepage.index') }}">{{ __('shop::app.minicart.checkout') }}</a>
                            </div>
                        </div>
                        <div class="cart-header medium">
                            <p class="cart-total">
                                {{ __('shop::app.checkout.cart.cart-subtotal') }}
                                <b class="cart-total-price">{{ core()->currency($cart->base_sub_total) }}
                                </b>
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        @else
            <div class="nav-cart dropdown-toggle cart btn-grid btn-grid-black">
                <span class="name btn-hover">
                    {{ ('Warenkorb') }}
                    <span class="count">
                        ({{ __('shop::app.minicart.zero') }})
                    </span>
                </span>
            </div>
        @endif

    </div>
</div>