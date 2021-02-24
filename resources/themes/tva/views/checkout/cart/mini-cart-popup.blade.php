@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
<?php $cart = cart()->getCart(); ?> @if ($cart)
<?php $items = $cart->items; ?>
<div class="nav-cart">
    <div class="cart-dropdown-container">
        <div class="dropdown-toggle cart btn-grid btn-grid-black icon">
            {{-- Cart Toggle + Counter --}}
            <span class="name">
                {{ ('Warenkorb') }}
                <span class="count"> ({{ $cart->items->count() }})</span>
            </span>
        </div>
        {{-- Cart panel--}}
        <div class="dropdown-list cart-panel">
            <div class="dropdown-container">
                <div class="dropdown-cart">
                    <div class="cart-header">
                        <p class="cart-total">
                            {{ __('shop::app.checkout.cart.cart-subtotal') }}
                            <b class="cart-total-price">{{ core()->currency($cart->base_sub_total) }}
                            </b>
                        </p>
                    </div>
                    <div class="dropdown-content cart-item">
                        @foreach ($items as $item)
                        <div class="cart-content">
                            <div class="cart-content-img">
                                @php $images = $item->product->getTypeInstance()->getBaseImage($item);
                                @endphp
                                <img src="{{ $images['small_image_url'] }}" />
                            </div>
                            <div class="cart-content-info">

                                <div class="title">{{ $item->name }}
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
                                    <p>{{ core()->currency($item->base_total) }}
                                    </p>
                                </div>


                                <div class="quantity">Quantity: {{ $item->quantity }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="cart-more btn-grid btn-grid-secondary">
                        <a class="btn-hover"
                            href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.minicart.view-cart') }}</a>
                    </div>
                    <div class="cart-continue btn-grid btn-grid-white">
                        <a class="btn-hover"
                            href="{{ route('shop.checkout.onepage.index') }}">{{ __('shop::app.minicart.checkout') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="nav-cart dropdown-toggle cart btn-grid btn-grid-black">
            <div>
                <span class="name">
                    {{ ('Warenkorb') }}
                    <span class="count">
                        ({{ __('shop::app.minicart.zero') }})
                    </span>
                </span>
            </div>
        </div>
        @endif

    </div>
</div>