<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo/logo.png')}}">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="body">
    <x-layouts.header></x-layouts.header>
    @include('messages.toast')
    @yield('content')
    <x-layouts.footer></x-layouts.footer>
</body>
</html>
