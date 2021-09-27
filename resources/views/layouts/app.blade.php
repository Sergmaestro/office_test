<!DOCTYPE html>
<html lang="{{ Str::of(app()->getLocale())->slug() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="referrer" content="origin" />

    <title>{{ $meta['title'] ?? config('app.name')}}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ mix('css/reset.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">


    <link rel="preload" href="{{ url("/fonts/CeraPro-Light.woff2") }}"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ url("fonts/CeraPro-Medium.woff2") }}"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ url("fonts/CeraPro-Bold.woff2") }}"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ url("fonts/CeraPro-Black.woff2") }}"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ url("webfonts/fa-regular-400.woff2") }}"
          as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ url("webfonts/fa-solid-900.woff2") }}"
          as="font" type="font/woff2" crossorigin>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="{{ url('/') }}" />

    @include('layouts._parts._head_script')
</head>
<body>
    <div id="app" class="min-vh-100 d-flex flex-column">
        <header class="et-header et-header-relative bg-white shadow-sm">
            @section('navbar-breadcrumbs')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('office.index') }}">Office</a>
                </li>
            @endsection

            @include('layouts._parts._siteheader')
        </header>

        <div class="d-block">
            @yield('content')
        </div>
        @include('layouts._parts._footer')
    </div>

    <script>
        window.Laravel = {"routes": {!! json_encode(getRoutesList(null, [
            'office'
        ])) !!} };
        @stack('routes')
    </script>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
