@extends('shop::layouts.masterSignUp')

@section('page_title')
 {{ __('shop::app.customer.forgot-password.page_title') }}
@stop

{{-- @push('css')
    <style>
        .button-group {
            margin-bottom: 25px;
        }
        .primary-back-icon {
            vertical-align: middle;
        }
    </style>
@endpush --}}

@section('content-wrapper')

<div class="auth-content">

    {!! view_render_event('bagisto.shop.customers.forget_password.before') !!}

    <form method="post" action="{{ route('customer.forgot-password.store') }}" @submit.prevent="onSubmit">

        {{ csrf_field() }}

        <div class="login-form">

            <div class="login-text">
               <h2 class="single-line">{{ __('shop::app.customer.forgot-password.title') }}</h2>
            </div>

            {!! view_render_event('bagisto.shop.customers.forget_password_form_controls.before') !!}

            <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                {{-- <label for="email">{{ __('shop::app.customer.forgot-password.email') }}</label> --}}
                <input type="email" placeholder="{{ __('shop::app.customer.forgot-password.email') }}" class="control control form-sub border-t" name="email" v-validate="'required|email'">

            </div>

            {!! view_render_event('bagisto.shop.customers.forget_password_form_controls.before') !!}

            <div class="btn-grid border-t btn-grid-primary">
                <button type="submit" class="btn-hover">
                    <span class="text">{{ __('shop::app.customer.forgot-password.submit') }}</span>
                </button>
            </div>


            <div class="control-group btn-grid border-t btn-grid-secondary">
                <button type="submit" class="btn-hover">
                <a href="{{ route('customer.session.index') }}">
                    {{ __('shop::app.customer.reset-password.back-link-title') }}
                </a>
            </button>
            </div>

        </div>
    </form>

    {!! view_render_event('bagisto.shop.customers.forget_password.before') !!}

</div>
@endsection