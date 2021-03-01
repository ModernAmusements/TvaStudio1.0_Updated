@extends('shop::layouts.masterBreadCrumb')

@section('page_title')
    {{ __('shop::app.checkout.cart.title') }}
@stop

@section('content-wrapper')
<div class="bread-crumbs">
    {{ Breadcrumbs::render('cart') }}
</div>
    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
    <section class="cart">
        @if ($cart)
            <div class="cart-content">
                <div class="left-side">
                    <form action="{{ route('shop.checkout.cart.update') }}" method="POST" @submit.prevent="onSubmit">
                        <div class="cart-item-list">
                        @csrf
                        @foreach ($cart->items as $key => $item)
                        @php
                            $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);
                        @endphp

                        <div class="item">
                            <div class="item-image">
                                <a href="{{ route('shop.productOrCategory.index', $item->product->url_key) }}">
                                    <img class="cart-img" src="{{ $productBaseImage['medium_image_url'] }}" />
                                </a>
                            </div>

                            <div class="item-details">
                                <div class="item-title">
                                    <a href="{{ route('shop.productOrCategory.index', $item->product->url_key) }}">
                                        <h1 class="large">{{ $item->product->name }}</h1>
                                    </a>
                                </div>
                                @if (isset($item->additional['attributes']))
                                    <div class="item-options">
                                        @foreach ($item->additional['attributes'] as $attribute)
                                            <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="misc medium">
                                    @if ($item->product->getTypeInstance()->showQuantityBox() === true)
                                        <quantity-changer
                                            :control-name="'qty[{{$item->id}}]'"
                                            quantity="{{$item->quantity}}">
                                        </quantity-changer>
                                    @endif
                                    <span class="remove">
                                        <a href="{{ route('shop.checkout.cart.remove', $item->id) }}" onclick="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')">{{ __('shop::app.checkout.cart.remove-link') }}</a>
                                    </span>
                                    {{--
                                    @auth('customer')
                                        <span class="towishlist">
                                            @if ($item->parent_id != 'null' ||$item->parent_id != null)
                                                <a href="{{ route('shop.movetowishlist', $item->id) }}" onclick="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')">{{ __('shop::app.checkout.cart.move-to-wishlist') }}</a>
                                            @else
                                                <a href="{{ route('shop.movetowishlist', $item->child->id) }}" onclick="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')">{{ __('shop::app.checkout.cart.move-to-wishlist') }}</a>
                                            @endif
                                        </span>
                                    @endauth --}}
                                    <div class="price">
                                        {{ core()->currency($item->base_price) }}
                                    </div>
                                </div>
                                @if (! cart()->isItemHaveQuantity($item))
                                    <div class="error-message">
                                        * {{ __('shop::app.checkout.cart.quantity-error') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    </div>

                        <div class="misc-controls">
                            <a href="{{ route('shop.home.index') }}" class="left">
                                {{ __('shop::app.checkout.cart.continue-shopping') }}
                            </a>
                            <div class="btn-grid border btn-grid-primary">
                                @if ($cart->hasProductsWithQuantityBox())
                                    <button type="submit" class="btn-hover" id="update_cart_button">
                                       <span>{{ __('shop::app.checkout.cart.update-cart') }}</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>

                <div class="right-side">
                    @include('shop::checkout.total.summary', ['cart' => $cart])
                    <coupon-component>
                    </coupon-component>
                    @if (! cart()->hasError())
                    <div class="btn-grid border-b border-r btn-grid-primary">
                        @if ($cart->hasProductsWithQuantityBox())
                        <a href="{{ route('shop.checkout.onepage.index') }}" class="btn-hover">
                            <span>{{ __('shop::app.checkout.cart.proceed-to-checkout') }}</span>
                        </a>
                    @endif
                    </div>

                    @endif
                </div>
            </div>

            @include ('shop::products.view.cross-sells')

            @else
            <div class="left-side">
                <div class="item-title">
                    <h1 class="xlarge">
                        {{ __('shop::app.checkout.cart.title') }}
                    </h1>
                </div>
                <div style="text-align: center">
                    <p class="medium">
                        {{ __('shop::app.checkout.cart.empty') }}
                    </p>
                    <div class="btn-grid mt-s border btn-grid-primary">
                        <a href="{{ route('shop.home.index') }}" class="btn-hover">
                            {{ __('shop::app.checkout.cart.continue-shopping') }}
                        </a>
                    </div>
                </div>
            </div>

        @endif
    </section>

@endsection

@push('scripts')
    @include('shop::checkout.cart.coupon')

    <script type="text/x-template" id="quantity-changer-template">
        <div class="quantity control-group" :class="[errors.has(controlName) ? 'has-error' : '']">
            <div class="wrap">
                <label>{{ __('shop::app.products.quantity') }}</label>

                <button type="button" class="decrease" @click="decreaseQty()">-</button>

                <input :name="controlName" class="control" :value="qty" v-validate="'required|numeric|min_value:1'" data-vv-as="&quot;{{ __('shop::app.products.quantity') }}&quot;" readonly>

                <button type="button" class="increase" @click="increaseQty()">+</button>

                <span class="control-error" v-if="errors.has(controlName)">@{{ errors.first(controlName) }}</span>
            </div>
        </div>
    </script>

    <script>
        Vue.component('quantity-changer', {
            template: '#quantity-changer-template',

            inject: ['$validator'],

            props: {
                controlName: {
                    type: String,
                    default: 'quantity'
                },

                quantity: {
                    type: [Number, String],
                    default: 1
                }
            },

            data: function() {
                return {
                    qty: this.quantity
                }
            },

            watch: {
                quantity: function (val) {
                    this.qty = val;

                    this.$emit('onQtyUpdated', this.qty)
                }
            },

            methods: {
                decreaseQty: function() {
                    if (this.qty > 1)
                        this.qty = parseInt(this.qty) - 1;

                    this.$emit('onQtyUpdated', this.qty)
                },

                increaseQty: function() {
                    this.qty = parseInt(this.qty) + 1;

                    this.$emit('onQtyUpdated', this.qty)
                }
            }
        });

        function removeLink(message) {
            if (!confirm(message))
            event.preventDefault();
        }

        function updateCartQunatity(operation, index) {
            var quantity = document.getElementById('cart-quantity'+index).value;

            if (operation == 'add') {
                quantity = parseInt(quantity) + 1;
            } else if (operation == 'remove') {
                if (quantity > 1) {
                    quantity = parseInt(quantity) - 1;
                } else {
                    alert('{{ __('shop::app.products.less-quantity') }}');
                }
            }
            document.getElementById('cart-quantity'+index).value = quantity;
            event.preventDefault();
        }
    </script>
@endpush