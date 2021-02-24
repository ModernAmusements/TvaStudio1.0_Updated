@extends('shop::layouts.masterBreadCrumb')

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
@endsection

@section('content-wrapper')


<div class="bread-crumbs">
    {{ Breadcrumbs::render('profileIndex') }}
</div>


<div class="account-content">

    @include('shop::customers.account.partials.sidemenu')

    <div class="account-layout">
            <div class="heading">
                <h2 class="single-line">   {{ __('shop::app.customer.account.profile.index.title') }}</h2>
            </div>
        <div class="account-table-content">
            <table>
                <tbody>
                    <tr>
                        <td>{{ __('shop::app.customer.account.profile.fname') }}</td>
                        <td>{{ $customer->first_name }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('shop::app.customer.account.profile.lname') }}</td>
                        <td>{{ $customer->last_name }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('shop::app.customer.account.profile.gender') }}</td>
                        <td>{{ __($customer->gender) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('shop::app.customer.account.profile.dob') }}</td>
                        <td>{{ $customer->date_of_birth }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('shop::app.customer.account.profile.email') }}</td>
                        <td>{{ $customer->email }}</td>
                    </tr>
                    @if ($customer->subscribed_to_news_letter == 1)
                        <tr>
                            <td> {{ __('shop::app.footer.subscribe-newsletter') }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('shop.unsubscribe', $customer->email) }}">{{ __('shop::app.subscription.unsubscribe') }} </a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="row-cta">
                <div class="account-action btn-grid border-t border-r border-b btn-grid-primary">
                    <button type="submit" @click="showModal('deleteProfile')" class="btn-hover">
                        <span>
                            {{ __('shop::app.customer.account.address.index.delete') }}
                        </span>
                    </button>
                </div>
                <div class="account-action btn-grid border-t border-b btn-grid-primary">
                    <a class="btn-hover" href="{{ route('customer.profile.edit') }}">
                        {{ __('shop::app.customer.account.profile.index.edit') }}
                    </a>
                </div>
            </div>
            <form method="POST" action="{{ route('customer.profile.destroy') }}" @submit.prevent="onSubmit">
                @csrf
                <modal class="mt-s" id="deleteProfile" :is-open="modalIds.deleteProfile">
                    <span slot="header">
                        {{ __('shop::app.customer.account.address.index.enter-password') }}
                    </span>
                    <div slot="body">
                        <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                            <label for="password" class="required">{{ __('admin::app.users.users.password') }}</label>
                            <input type="password" v-validate="'required|min:6|max:18'" class="control form-control border-t border-b subscribe-field form-sub" id="password" name="password" data-vv-as="&quot;{{ __('admin::app.users.users.password') }}&quot;"/>
                            <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                        </div>
                        <div class="page-action border-b btn-grid btn-grid-primary">
                            <button type="submit"  class="btn-hover">
                                <span>
                                    {{ __('shop::app.customer.account.address.index.delete') }}
                                </span>
                            </button>
                        </div>
                    </div>
                </modal>
            </form>
        </div>
    </div>
</div>
@endsection
