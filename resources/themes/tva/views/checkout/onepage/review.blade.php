<div class="form-container">
    <div class="form-header">
        <h1 class="checkout-step-heading">
            {{ __('shop::app.checkout.onepage.summary') }}
        </h1>
    </div>


    <div class="address-summary">
        @if ($billingAddress = $cart->billing_address)
            <div class="billing-address">
                <div class="card-title">
                    <b>{{ __('shop::app.checkout.onepage.billing-address') }}</b>
                </div>

                <div class="card-content">
                    <ul>
                        <li>
                            {{ $billingAddress->first_name }} {{ $billingAddress->last_name }}
                        </li>
                        <li>
                            {{ $billingAddress->address1 }},<br/> {{ $billingAddress->state }}
                        </li>
                        <li>
                            {{ core()->country_name($billingAddress->country) }} {{ $billingAddress->postcode }}
                        </li>

                        <li>
                            {{ __('shop::app.checkout.onepage.contact') }} : {{ $billingAddress->phone }}
                        </li>
                    </ul>
                </div>
            </div>
        @endif

        @if ($cart->haveStockableItems() && $shippingAddress = $cart->shipping_address)
            <div class="shipping-address">
                <div class="card-title">
                    <b>{{ __('shop::app.checkout.onepage.shipping-address') }}</b>
                </div>

                <div class="card-content">
                    <ul>
                        <li>
                            {{ $shippingAddress->first_name }} {{ $shippingAddress->last_name }}
                        </li>
                        <li>
                            {{ $shippingAddress->address1 }},<br/> {{ $shippingAddress->state }}
                        </li>
                        <li>
                            {{ core()->country_name($shippingAddress->country) }} {{ $shippingAddress->postcode }}
                        </li>
                        <li>
                            {{ __('shop::app.checkout.onepage.contact') }} : {{ $shippingAddress->phone }}
                        </li>
                    </ul>
                </div>
            </div>
        @endif

    </div>

    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

    <div class="cart-item-list">
        @foreach ($cart->items as $item)
            @php
                $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);
            @endphp

            <div class="item-review">
                <div class="item-image">
                    <img src="{{ $productBaseImage['medium_image_url'] }}" />
                </div>

                <div class="item-details">

                    {!! view_render_event('bagisto.shop.checkout.name.before', ['item' => $item]) !!}

                    <div class="item-title">
                        <span class="title">
                            Name:
                        </span>
                       <h3>
                            {{ $item->product->name }}
                        </h3>
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.name.after', ['item' => $item]) !!}
                    {!! view_render_event('bagisto.shop.checkout.price.before', ['item' => $item]) !!}

                    <div class="row">
                        <span class="title">
                            {{ __('shop::app.checkout.onepage.price') }}:
                        </span>
                        <h4 class=" value">
                            {{ core()->currency($item->base_price) }}
                        </h4>
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.price.after', ['item' => $item]) !!}
                    {!! view_render_event('bagisto.shop.checkout.quantity.before', ['item' => $item]) !!}

                    <div class="row">
                        <span class="title">
                            {{ __('shop::app.checkout.onepage.quantity') }}:
                        </span>
                        <h4 class="value">
                            {{ $item->quantity }}
                        </h4>
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.quantity.after', ['item' => $item]) !!}

                    {!! view_render_event('bagisto.shop.checkout.options.before', ['item' => $item]) !!}

                    @if (isset($item->additional['attributes']))
                        <div class="item-options">

                            @foreach ($item->additional['attributes'] as $attribute)
                                <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                            @endforeach

                        </div>
                    @endif

                    {!! view_render_event('bagisto.shop.checkout.options.after', ['item' => $item]) !!}
                </div>
            </div>
        @endforeach
    </div>

    <div class="order-description">

            @if ($cart->haveStockableItems())
                <div class="shipping">

                    <div class="form-header">
                        <h4 class="checkout-step-heading">
                            Shipping
                        </h4>
                    </div>

                    <div class="text">
                        {{ core()->currency($cart->selected_shipping_rate->base_price) }}

                        <div class="info">
                            {{ $cart->selected_shipping_rate->method_title }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="payment">

                <div class="form-header">
                    <h4 class="checkout-step-heading">
                        Payment
                    </h4>
                </div>

                <div class="text">
                    {{ core()->getConfigData('sales.paymentmethods.' . $cart->payment->method . '.title') }}
                </div>
            </div>

            {{-- <slot name="summary-section">

            </slot> --}}

    </div>
</div>