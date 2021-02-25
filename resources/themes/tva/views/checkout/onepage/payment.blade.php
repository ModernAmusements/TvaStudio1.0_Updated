<form data-vv-scope="payment-form">
    <div class="form-container">
        <div class="form-header">
            <h1 class="checkout-step-heading">
                {{ __('shop::app.checkout.onepage.payment-methods') }}
            </h1>
        </div>


        <div class="payment-methods">
            <div class="control-group" :class="[errors.has('payment-form.payment[method]') ? 'has-error' : '']">
                @foreach ($paymentMethods as $payment)
                    {!! view_render_event('bagisto.shop.checkout.payment-method.before', ['payment' => $payment]) !!}
                <div class="method">
                    <div class="method-content">
                            <h3 class="carrier-title" id="carrier-title">
                                {{ $payment['method_title'] }}
                            </h3>
                        <div class="checkout-method-group">
                                <label class="radio-container">
                                    <input v-validate="'required'" type="radio" id="{{ $payment['method'] }}" name="payment[method]" value="{{ $payment['method'] }}" v-model="payment.method" @change="methodSelected()" data-vv-as="&quot;{{ __('shop::app.checkout.onepage.payment-method') }}&quot;">
                                    <span class="checkmark"></span>
                                    <div class="method-summary">
                                        {{ __($payment['description']) }}
                                    </div>
                                </label>


                        </div>
                        {!! view_render_event('bagisto.shop.checkout.payment-method.after', ['payment' => $payment]) !!}
                        </div>
                </div>
                @endforeach

            </div>
                <span class="control-error" v-if="errors.has('payment-form.payment[method]')">
                    @{{ errors.first('payment-form.payment[method]') }}
                </span>

            </div>
        </div>
    </div>
</form>