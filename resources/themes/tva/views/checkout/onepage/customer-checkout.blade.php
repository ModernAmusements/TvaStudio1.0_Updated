<div v-if="is_customer_exist">
    <div class="control-group" id="password">
        <label for="password">{{ __('shop::app.checkout.onepage.password') }}</label>
        <input type="password" class="control form-control subscribe-field form-sub" id="password" name="password" v-model="address.billing.password"/>
    </div>

    <div class="control-group" id="login-and-forgot-btn">
        <div class="forgot-password-link">
            <a class="left" href="{{ route('customer.forgot-password.create') }}">{{ __('shop::app.customer.login-form.forgot_pass') }}</a>

            <div>
                @if (Cookie::has('enable-resend') && Cookie::get('enable-resend') == true)
                    <a href="{{ route('customer.resend.verification-email', Cookie::get('email-for-resend')) }}">{{ __('shop::app.customer.login-form.resend-verification') }}</a>
                @endif
            </div>
        </div>
        <div class="btn-grid border-t btn-grid-primary">
            <button type='button' id="" class="btn-hover" @click="loginCustomer">
                {{ __('shop::app.customer.login-form.button_title') }}
            </button>
        </div>
    </div>
</div>