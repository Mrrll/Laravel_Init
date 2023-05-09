<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="body body-dashboard bg-body">
    <x-layouts.header></x-layouts.header>
    <x-layouts.aside></x-layouts.aside>
    @include('messages.toast')
    @yield('content')
    <x-layouts.footer></x-layouts.footer>
</body>
</html>
