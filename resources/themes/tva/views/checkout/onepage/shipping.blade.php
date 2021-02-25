<form data-vv-scope="shipping-form">
    <div class="form-container">
        <div class="form-header">
            <h1 class="checkout-step-heading">
                {{ __('shop::app.checkout.onepage.shipping-method') }}
            </h1>
        </div>

        <div class="shipping-methods">
            <div class="control-group" :class="[errors.has('shipping-form.shipping_method') ? 'has-error' : '']">
                @foreach ($shippingRateGroups as $rateGroup)
                    {!! view_render_event('bagisto.shop.checkout.shipping-method.before', ['rateGroup' => $rateGroup]) !!}
                <div class="method">
                    <div class="method-content">
                    <h3 class="carrier-title" id="carrier-title">
                        {{ $rateGroup['carrier_title'] }}
                    </h3>
                    @foreach ($rateGroup['rates'] as $rate)
                        <div class="checkout-method-group">
                            <label class="radio-container">
                                <input v-validate="'required'" type="radio" id="{{ $rate->method }}" name="shipping_method" data-vv-as="&quot;{{ __('shop::app.checkout.onepage.shipping-method') }}&quot;" value="{{ $rate->method }}" v-model="selected_shipping_method" @change="methodSelected()">
                                <span class="checkmark"></span>
                                <b class="ship-rate method-label">{{ core()->currency($rate->base_price) }}</b>
                            </label>
                            <div class="method-summary">
                                <b>{{ $rate->method_title }}</b> - {{ __($rate->method_description) }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
                    {!! view_render_event('bagisto.shop.checkout.shipping-method.after', ['rateGroup' => $rateGroup]) !!}

                @endforeach

                <span class="control-error" v-if="errors.has('shipping-form.shipping_method')">
                    @{{ errors.first('shipping-form.shipping_method') }}
                </span>
            </div>
        </div>
    </div>
</form>