<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('style')

</head>
<body>
@include('frontend.partials._header')

<main role="main">

    @yield('content')

</main>

@include('frontend.partials._footer')

<script src="{{ mix('js/app.js') }}"></script>

@yield('script')

</body>
</html>
