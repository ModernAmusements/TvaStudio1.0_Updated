@extends('shop::layouts.masterBreadCrumb')

@section('page_title')
    {{ __('shop::app.customer.account.address.index.page-title') }}
@endsection

@section('content-wrapper')

<div class="bread-crumbs">
    {{ Breadcrumbs::render('profileAddress') }}
</div>
    <div class="account-content">
        @include('shop::customers.account.partials.sidemenu')
        <div class="account-layout">
            <div class="heading border-b">
                <h2 class="single-line">
                    {{ __('shop::app.customer.account.address.index.title') }}
                </h2>
                @if (! $addresses->isEmpty())
                <span class="account-action">
                    <a href="{{ route('customer.address.create') }}">
                        {{ __('shop::app.customer.account.address.index.add') }}
                    </a>
                </span>
                @else
                    <span>

                    </span>
                @endif
            </div>
            <div class="account-table-content">
                @if ($addresses->isEmpty())
                <div class="account-action">
                    <p>{{ __('shop::app.customer.account.address.index.empty') }}</p>
                    <a href="{{ route('customer.address.create') }}">{{ __('shop::app.customer.account.address.index.add') }}</a>
                </div>
                @else
                <div class="address-holder">
                    @foreach ($addresses as $address)
                        <div class="address-card address-card-no-padding">
                            <div class="details">
                                <div class="card-info">
                                    <span class="bold">
                                        {{ auth()->guard('customer')->user()->name }}
                                    </span>
                                    <ul class="address-card-list">
                                        <li>
                                            {{ $address->company_name }}
                                        </li>

                                        <li>
                                            {{ $address->first_name }}
                                        </li>

                                        <li>
                                            {{ $address->last_name }}
                                        </li>

                                        <li>
                                            {{ $address->address1 }},
                                        </li>

                                        <li>
                                            {{ $address->city }}
                                        </li>

                                        <li>
                                            {{ $address->state }}
                                        </li>

                                        <li>
                                            {{ core()->country_name($address->country) }} {{ $address->postcode }}
                                        </li>

                                        <li>
                                            {{ __('shop::app.customer.account.address.index.contact') }}
                                            : {{ $address->phone }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="row-cta">
                                    <div class="btn-grid border-t border-r btn-grid-primary">
                                        <a class="btn-hover" href="{{ route('customer.address.edit', $address->id) }}">
                                            <span>
                                                {{ __('shop::app.customer.account.address.index.edit') }}
                                            </span>
                                        </a>
                                    </div>
                                    <div class="btn-grid border-t btn-grid-primary">
                                        <a class="btn-hover" href="{{ route('address.delete', $address->id) }}" onclick="deleteAddress('{{ __('shop::app.customer.account.address.index.confirm-delete') }}')">
                                            <span>
                                                {{ __('shop::app.customer.account.address.index.delete') }}
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function deleteAddress(message) {
            if (!confirm(message))
                event.preventDefault();
        }
    </script>
@endpush
