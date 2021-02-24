@extends('shop::layouts.masterSignUp')


@section('page_title')
    {{ __('shop::app.customer.signup-form.page-title') }}
@endsection



@section('content-wrapper')

<!-- Header CATS -->
<div class="bread-crumbs">
    {{ Breadcrumbs::render('register') }}
</div>

<div class="auth-content">

    <div class="sign-up-text">
        {{ __('shop::app.customer.signup-text.account_exists') }} - <a href="{{ route('customer.session.index') }}">{{ __('shop::app.customer.signup-text.title') }}</a>
    </div>

    {!! view_render_event('bagisto.shop.customers.signup.before') !!}

    <form method="post" action="{{ route('customer.register.create') }}" @submit.prevent="onSubmit">

        {{ csrf_field() }}

        <div class="login-form">
            {{-- <div class="login-text">
                <h2>{{ __('shop::app.customer.signup-form.title') }}</h2>
            </div> --}}
            <div class="login-image">
                <img class="border-b" src="http://127.0.0.1:8000/cache/large/product/8/z98HfFrlPUKfaSFTT30a62JwP9wk7NgAfa1ps9wx.png"
                id="pro-img" data-image="http://127.0.0.1:8000/cache/original/product/8/z98HfFrlPUKfaSFTT30a62JwP9wk7NgAfa1ps9wx.png">
            </div>

            {!! view_render_event('bagisto.shop.customers.signup_form_controls.before') !!}

            <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
                {{-- <label for="first_name" class="required">{{ __('shop::app.customer.signup-form.firstname') }}</label> --}}
                <input type="text" placeholder="{{ __('shop::app.customer.signup-form.firstname') }}" class="control form-sub border-b" name="first_name" v-validate="'required'" value="{{ old('first_name') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.firstname') }}&quot;">
            </div>

            {!! view_render_event('bagisto.shop.customers.signup_form_controls.firstname.after') !!}

            <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                <span class="control-error" v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</span>
                {{-- <label for="last_name" class="required">{{ __('shop::app.customer.signup-form.lastname') }}</label> --}}
                <input type="text" placeholder="{{ __('shop::app.customer.signup-form.lastname') }}" class="control form-sub border-b " name="last_name" v-validate="'required'" value="{{ old('last_name') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.lastname') }}&quot;">
            </div>

            {!! view_render_event('bagisto.shop.customers.signup_form_controls.lastname.after') !!}

            <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                {{-- <label for="email" class="required">{{ __('shop::app.customer.signup-form.email') }}</label> --}}
                <input type="email" placeholder="{{ __('shop::app.customer.signup-form.email') }}"  class="control form-sub border-b" name="email" v-validate="'required|email'" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.email') }}&quot;">
            </div>

            {!! view_render_event('bagisto.shop.customers.signup_form_controls.email.after') !!}

            <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                {{-- <label for="password" class="required">{{ __('shop::app.customer.signup-form.password') }}</label> --}}
                <input type="password" placeholder="{{ __('shop::app.customer.signup-form.password') }}"  class="control form-sub border-b" name="password" v-validate="'required|min:6'" ref="password" value="{{ old('password') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.password') }}&quot;">
            </div>

            {!! view_render_event('bagisto.shop.customers.signup_form_controls.password.after') !!}

            <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
                {{-- <label for="password_confirmation" class="required">{{ __('shop::app.customer.signup-form.confirm_pass') }}</label> --}}
                <input type="password" placeholder="{{ __('shop::app.customer.signup-form.confirm_pass') }}" class="control form-sub border-b" name="password_confirmation"  v-validate="'required|min:6|confirmed:password'" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.confirm_pass') }}&quot;">
            </div>

            {!! view_render_event('bagisto.shop.customers.signup_form_controls.after') !!}

            {{-- <div class="signup-confirm control-group" :class="[errors.has('agreement') ? 'has-error' : '']">
                <span class="control-error" v-if="errors.has('agreement')">@{{ errors.first('agreement') }}</span>
                <input type="checkbox" id="checkbox2" name="agreement" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.agreement') }}&quot;">
                <span>{{ __('shop::app.customer.signup-form.agree') }}
                    <a href="">{{ __('shop::app.customer.signup-form.terms') }}</a> & <a href="">{{ __('shop::app.customer.signup-form.conditions') }}</a> {{ __('shop::app.customer.signup-form.using') }}.
                </span>
            </div> --}}
             <div class="signup-confirm" :class="[errors.has('agreement') ? 'has-error' : '']">
                <span class="control-error" v-if="errors.has('agreement')">@{{ errors.first('agreement') }}</span>
                <div class="confirm-group">
                    <input type="checkbox" id="checkbox2" name="agreement" v-validate="'required'">
                    <label class="checkbox-view" for="checkbox2"></label>
                    <span>{{ __('shop::app.customer.signup-form.agree') }}
                        <a href="">{{ __('shop::app.customer.signup-form.terms') }}</a> & <a href="">{{ __('shop::app.customer.signup-form.conditions') }}</a> {{ __('shop::app.customer.signup-form.using') }}.
                    </span>
                </div>
            </div>

        <div class="btn-grid btn-grid-primary">
            <button class="btn-hover" type="submit">
                <span class="text">{{ __('shop::app.customer.signup-form.button_title') }}</span>
            </button>
        </div>
        </div>
    </form>

    {!! view_render_event('bagisto.shop.customers.signup.after') !!}
</div>
@endsection
