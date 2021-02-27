@extends('shop::layouts.masterSignUp')


@section('page_title')
    {{ __('shop::app.customer.login-form.page-title') }}
@endsection


@section('content-wrapper')

<!-- Header CATS -->
<div class="bread-crumbs">
    {{ Breadcrumbs::render('login') }}
</div>

    <div class="auth-content">
        <div class="sign-up-text">
            {{ __('shop::app.customer.login-text.no_account') }} - <a href="{{ route('customer.register.index') }}">{{ __('shop::app.customer.login-text.title') }}</a>
        </div>

        {!! view_render_event('bagisto.shop.customers.login.before') !!}

        <form method="POST" action="{{ route('customer.session.create') }}" @submit.prevent="onSubmit">
            {{ csrf_field() }}
            <div class="login-form">
                {{-- <div class="login-text">{{ __('shop::app.customer.login-form.title') }}</div> --}}

                <div class="login-image">
                    <img class="border-b" src="http://127.0.0.1:8000/cache/large/product/8/z98HfFrlPUKfaSFTT30a62JwP9wk7NgAfa1ps9wx.png"
                    id="pro-img" data-image="http://127.0.0.1:8000/cache/original/product/8/z98HfFrlPUKfaSFTT30a62JwP9wk7NgAfa1ps9wx.png">
                </div>


                {!! view_render_event('bagisto.shop.customers.login_form_controls.before') !!}


                <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                    <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                    {{-- <label for="email" class="required">{{ __('shop::app.customer.login-form.email') }}</label> --}}
                    <input type="text"  placeholder="{{ __('shop::app.customer.login-form.email') }}" class="control form-sub border-b" name="email" v-validate="'required|email'" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.login-form.email') }}&quot;">

                </div>

                <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                    <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                    {{-- <label for="password" class="required">{{ __('shop::app.customer.login-form.password') }}</label> --}}
                    <input type="password" placeholder="{{ __('shop::app.customer.login-form.password') }}" v-validate="'required|min:6'" class="form-sub border-b control" id="password" name="password" data-vv-as="&quot;{{ __('admin::app.users.sessions.password') }}&quot;" value=""/>
                </div>

                {!! view_render_event('bagisto.shop.customers.login_form_controls.after') !!}

                <div class="forgot-password-link">
                    <a class="left" href="{{ route('customer.forgot-password.create') }}">{{ __('shop::app.customer.login-form.forgot_pass') }}</a>

                    <div>
                        @if (Cookie::has('enable-resend'))
                            @if (Cookie::get('enable-resend') == true)
                                <a href="{{ route('customer.resend.verification-email', Cookie::get('email-for-resend')) }}">{{ __('shop::app.customer.login-form.resend-verification') }}</a>
                            @endif
                        @endif
                    </div>
                </div>


        <div class="btn-grid border-t btn-grid-primary">
            <button class="btn-hover" type="submit" value="{{ __('shop::app.customer.login-form.button_title') }}">
                <span class="text">LogIn</span>
            </button>
        </div>

            </div>
        </form>

        {!! view_render_event('bagisto.shop.customers.login.after') !!}
    </div>

@stop

