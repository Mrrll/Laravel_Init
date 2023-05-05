@extends('layouts.plantilla')
@section('title', 'login')
@section('content')
    <main class="container-fluid main-dashboard center_container">
        <x-dom.card header="header" footer="footer" :route="route('register')" style="width: 415.334px">
            <x-slot:header class="text-center">
                Sign Up
            </x-slot:header>
            @include('auth.partials.register')
            <x-slot:footer class="text-end">
                <x-dom.button type="submit" class="btn-success">Sign Up</x-dom.button>
            </x-slot:footer>
        </x-dom.card>
    </main>
@endsection
