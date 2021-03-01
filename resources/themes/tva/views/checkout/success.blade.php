@extends('shop::layouts.masterBreadCrumb')

@section('page_title')
    {{ __('shop::app.checkout.success.title') }}
@stop

@section('content-wrapper')

<div class="bread-crumbs">
    {{ Breadcrumbs::render('orderSuccess') }}
</div>

    <div class="order-success-content">
        <h1>{{ __('shop::app.checkout.success.thanks') }}</h1>

        <p class="large">{{ __('shop::app.checkout.success.order-id-info', ['order_id' => $order->increment_id]) }}</p>

        <p class="large mt-s">{{ __('shop::app.checkout.success.info') }}</p>

        {{ view_render_event('bagisto.shop.checkout.continue-shopping.before', ['order' => $order]) }}

    <div class="btn-grid border-l mt-s mb-s border-b border-t border-r btn-grid-primary">
        <a  href="{{ route('shop.home.index') }}" class="btn-hover">
            {{ __('shop::app.checkout.cart.continue-shopping') }}
        </a>
    </div>

        {{ view_render_event('bagisto.shop.checkout.continue-shopping.after', ['order' => $order]) }}

    </div>
@endsection
