@extends('shop::layouts.masterBreadCrumb')

@include('shop::guest.compare.compare-products')

@section('page_title')
    {{ __('velocity::app.customer.compare.compare_similar_items') }}
@endsection

@section('content-wrapper')

<div class="bread-crumbs">
    {{ Breadcrumbs::render('profileCompare') }}
</div>

    <div class="account-content">
        @include('shop::customers.account.partials.sidemenu')

        <div class="account-layout">

            <div class="account-items-list">
                <div class="account-table-content">
                    <compare-product></compare-product>
                </div>
            </div>


        </div>

    </div>

@endsection
