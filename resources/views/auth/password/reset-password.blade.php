@extends('layouts.plantilla')
@section('title', trans('Reset Password'))
@section('content')
    <main class="container-fluid main-dashboard center_container">
        <x-dom.card header="header" footer="footer" :route="route('password.update')" method="post" style="width: 415.334px">
            <x-slot:header class="text-center">
                @lang('Reset Password')
            </x-slot:header>
            @include('auth.password.partials.reset-password')
            <x-slot:footer class="text-end">
                <x-dom.button type="submit" class="btn-warning">
                    @lang('Change')
                </x-dom.button>
            </x-slot:footer>
        </x-dom.card>
    </main>
@endsection
