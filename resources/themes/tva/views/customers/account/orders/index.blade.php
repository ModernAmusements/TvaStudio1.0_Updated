@extends('shop::layouts.masterBreadCrumb')

@section('page_title')
    {{ __('shop::app.customer.account.order.index.page-title') }}
@endsection
@section('content-wrapper')
<div class="bread-crumbs">
    {{ Breadcrumbs::render('profileOrders') }}
</div>
    <div class="account-content">
        @include('shop::customers.account.partials.sidemenu')
        <div class="account-layout">
            <div class="heading">
                <h2 class="single-line">
                    {{ __('shop::app.customer.account.order.index.title') }}
                </h2>
                {{-- <a href="{{ route('customer.account.index') }}">Back</a> --}}
            </div>
            <div class="account-items-list">
                <div class="account-table-content">
                    {!! app('Webkul\Shop\DataGrids\OrderDataGrid')->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection