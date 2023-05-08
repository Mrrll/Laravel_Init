@extends('layouts.plantilla')
@section('title', 'Reset Password')
@section('content')
    <main class="container-fluid main-dashboard center_container">
        <x-dom.card header="header" footer="footer" :route="route('password.update')" method="post" style="width: 415.334px">
            <x-slot:header class="text-center">
                Reset Password
            </x-slot:header>
            @include('auth.password.partials.reset-password')
            <x-slot:footer class="text-end">
                <x-dom.button type="submit" class="btn-success">Save</x-dom.button>
            </x-slot:footer>
        </x-dom.card>
    </main>
@endsection
