@extends('layouts.plantilla')
@section('title', trans('Sign In'))
@section('content')
    <main class="container-fluid main-dashboard center_container">
        <x-dom.card header="header" footer="footer" :route="route('login')" style="width: 415.334px">
            <x-slot:header class="text-center">
                @lang('Sign In')
            </x-slot:header>
            @include('auth.partials.login')
            <x-slot:footer class="text-end">
                <x-dom.button type="submit" class="btn-success">
                    @lang('Sign In')
                </x-dom.button>
            </x-slot:footer>
        </x-dom.card>
        @include('auth.password.forgot-password')
    </main>
@endsection
