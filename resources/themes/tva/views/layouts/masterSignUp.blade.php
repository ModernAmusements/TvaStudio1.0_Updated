<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('page_title')</title>
    {{-- META --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
    {{-- STYLE --}}
    {{-- <link rel="stylesheet" href="{{ bagisto_asset('css/shop.css') }}"> --}}
    <link rel="stylesheet" href="{{ bagisto_asset('css/index.css') }}">
    @if ($favicon = core()->getCurrentChannel()->favicon_url)
        <link rel="icon" sizes="16x16" href="{{ $favicon }}" />
    @else
        <link rel="icon" sizes="16x16" href="{{ bagisto_asset('images/favicon.ico') }}" />
    @endif
    @yield('head')
    {{-- SEO --}}
    @section('seo')
        @if (! request()->is('/'))
            <meta name="description" content="{{ core()->getCurrentChannel()->description }}" />
        @endif
    @show
    @stack('css')
</head>
<body @if (core()->getCurrentLocale()->direction == 'rtl') class="rtl" @endif>
      {{-- Nav --}}
      @include('shop::layouts.header.indexSignUp')
        {{-- Vue + Main App--}}
    <div id="app">
        <flash-wrapper ref='flashes'>
        </flash-wrapper>
        {{-- Main App--}}
        <div class="main-container-wrapper">
            <div class="content-container">
                @yield('content-wrapper')
            </div>
        </div>
        {{-- FOOTER --}}
        @include('shop::layouts.footer.footer')
    </div>
    {{-- flashMessages --}}
    <script type="text/javascript">
        window.flashMessages = [];
        @if ($success = session('success'))
            window.flashMessages = [{'type': 'alert-success', 'message': "{{ $success }}" }];
        @elseif ($warning = session('warning'))
            window.flashMessages = [{'type': 'alert-warning', 'message': "{{ $warning }}" }];
        @elseif ($error = session('error'))
            window.flashMessages = [{'type': 'alert-error', 'message': "{{ $error }}" }
            ];
        @elseif ($info = session('info'))
            window.flashMessages = [{'type': 'alert-info', 'message': "{{ $info }}" }
            ];
        @endif
        window.serverErrors = [];
        @if(isset($errors))
            @if (count($errors))
                window.serverErrors = @json($errors->getMessages());
            @endif
        @endif
    </script>
    {{-- JSCRIPT --}}
    <script type="text/javascript" src="{{ bagisto_asset('js/shop.js') }}"></script>
    <script type="text/javascript" src="{{ bagisto_asset('js/ui.js') }}"></script>
    <script type="text/javascript" src="{{ bagisto_asset('js/mainApp.js') }}"></script>

    @stack('scripts')
    {{-- MODAL --}}
    <div class="modal-overlay"></div>
</body>
</html>