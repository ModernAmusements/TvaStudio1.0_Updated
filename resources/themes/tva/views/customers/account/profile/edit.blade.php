@extends('shop::layouts.masterBreadCrumb')
@section('page_title')
    {{ __('shop::app.customer.account.profile.edit-profile.page-title') }}
@endsection
@section('content-wrapper')
<div class="bread-crumbs">
    {{ Breadcrumbs::render('profileEdit') }}
</div>
    <div class="account-content">
        @include('shop::customers.account.partials.sidemenu')
        <div class="account-layout">
            <div class="heading">
                {{-- <a href="{{ route('customer.account.index') }}">Back</a> --}}
                <h2 class="single-line">
                    {{ __('shop::app.customer.account.profile.edit-profile.title') }}
                </h2>
            </div>
            <form method="post" action="{{ route('customer.profile.edit') }}" @submit.prevent="onSubmit">
                <div class="edit-form">
                    @csrf

                    <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                        <label for="fname" class="required">First Name</label>
                        <input type="text" placeholder="{{ __('shop::app.customer.account.profile.fname') }}" class="control form-control subscribe-field form-sub" name="first_name" value="{{ old('first_name') ?? $customer->first_name }}" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.fname') }}&quot;">
                        <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
                    </div>


                    <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                        <label for="lname" class="required">Last Name</label>
                        <input type="text" placeholder="{{ __('shop::app.customer.account.profile.lname') }}" class="control form-control subscribe-field form-sub" name="last_name" value="{{ old('last_name') ?? $customer->last_name }}" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.lname') }}&quot;">
                        <span class="control-error" v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</span>
                    </div>


                    <div class="control-group" :class="[errors.has('gender') ? 'has-error' : '']">
                        <label for="email" class="required">{{ __('shop::app.customer.account.profile.gender') }}</label>
                        <select name="gender" class="c-form control" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.gender') }}&quot;">
                            <option value=""  @if ($customer->gender == "") selected @endif></option>
                            <option value="Other"  @if ($customer->gender == "Other") selected @endif>{{ __('shop::app.customer.account.profile.other') }}</option>
                            <option value="Male"  @if ($customer->gender == "Male") selected @endif>{{ __('shop::app.customer.account.profile.male') }}</option>
                            <option value="Female" @if ($customer->gender == "Female") selected @endif>{{ __('shop::app.customer.account.profile.female') }}</option>
                        </select>
                        <span class="control-error" v-if="errors.has('gender')">@{{ errors.first('gender') }}</span>
                    </div>



                    <div class="control-group"  :class="[errors.has('date_of_birth') ? 'has-error' : '']">
                        <label for="date">{{ __('shop::app.customer.account.profile.dob') }}</label>
                        <input type="date" placeholder="{{ __('shop::app.customer.account.profile.dob') }}" class="control form-control subscribe-field form-sub" name="date_of_birth" value="{{ old('date_of_birth') ?? $customer->date_of_birth }}" v-validate="" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.dob') }}&quot;">
                        <span class="control-error" v-if="errors.has('date_of_birth')">@{{ errors.first('date_of_birth') }}</span>
                    </div>


                    <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                        <label for="email">{{ __('shop::app.customer.account.profile.email') }}</label>
                        <input type="email" placeholder="{{ __('shop::app.customer.account.profile.email') }}" class="control form-control subscribe-field form-sub" name="email" value="{{ old('email') ?? $customer->email }}" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.email') }}&quot;">
                        <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('oldpassword') ? 'has-error' : '']">
                        <label for="password">{{ __('shop::app.customer.account.profile.opassword') }}</label>
                        <input type="password" class="control form-control subscribe-field form-sub" name="oldpassword" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.opassword') }}&quot;" v-validate="'min:6'">
                        <span class="control-error" v-if="errors.has('oldpassword')">@{{ errors.first('oldpassword') }}</span>
                    </div>


                    <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                        <label for="password">{{ __('shop::app.customer.account.profile.password') }}</label>
                        <input type="password" placeholder="{{ __('shop::app.customer.account.profile.password') }}" id="password" class="control form-control subscribe-field form-sub" name="password" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.password') }}&quot;" v-validate="'min:6'">
                        <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                    </div>


                    <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                        <label for="password">{{ __('shop::app.customer.account.profile.cpassword') }}</label>
                        {{-- <input type="password" placeholder="{{ __('shop::app.customer.account.profile.cpassword') }}" id="password_confirmation" class="control form-control subscribe-field form-sub" name="password_confirmation" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.cpassword') }}&quot;" v-validate="'min:6|confirmed:password'"> --}}
                        <input type="password" placeholder="{{ __('shop::app.customer.account.profile.cpassword') }}" id="password_confirmation" class="control form-control subscribe-field form-sub" name="password_confirmation" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.cpassword') }}&quot;">

                        <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
                    </div>



                    <div class="button-group btn-grid border-t  border-b btn-grid-primary">
                        <button class="btn-hover" type="submit" value="{{ __('shop::app.customer.account.profile.submit') }}">
                        <span>
                            {{ __('shop::app.customer.account.profile.submit') }}
                        </span>
                    </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
