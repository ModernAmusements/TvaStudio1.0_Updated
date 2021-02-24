@extends('shop::layouts.masterBreadCrumb')

@section('page_title')
    {{ __('shop::app.customer.account.downloadable_products.title') }}
@endsection

@section('content-wrapper')
<div class="bread-crumbs">
    {{ Breadcrumbs::render('profileDownload') }}
</div>

    <div class="account-content">
        @include('shop::customers.account.partials.sidemenu')

        <div class="account-layout">

            <div class="heading">

                <h2 class="single-line">
                    {{ __('shop::app.customer.account.downloadable_products.title') }}
                </h2>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.downloadable_products.list.before') !!}

            <div class="account-items-list">
                <div class="account-table-content">

                    {!! app('Webkul\Shop\DataGrids\DownloadableProductDataGrid')->render() !!}

                </div>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.downloadable_products.list.after') !!}

        </div>

    </div>

@endsection