@extends('layouts.plantilla')

@section('title', 'Welcome')

@section('content')
    <main class="container-fluid main-dashboard">
        <h1>Hola mundo</h1>
        <x-dom.modal name="sign-in" static="static" header="header" class="modal-dialog-centered" :route="route('login')">
                <x-slot:title>
                    <h1 class="modal-title fs-5" id="Label">Sign In</h1>
                    <x-dom.button type="closemodal" class="btn-close"></x-dom.button>
                </x-slot:title>
                @include('auth.partials.login')
                <x-slot:footer>
                    <x-dom.button type="closemodal" class="btn btn-secondary">
                        Close
                    </x-dom.button>
                    <x-dom.button type="submit" class="btn-success">
                        Sign In
                    </x-dom.button>
                </x-slot:footer>
        </x-dom.modal>
        <x-dom.modal name="sign-up" static="static" header="header" class="modal-dialog-centered" :route="route('register')">
                <x-slot:title>
                    <h1 class="modal-title fs-5" id="Label">Sign Up</h1>
                    <x-dom.button type="closemodal" class="btn-close"></x-dom.button>
                </x-slot:title>
                @include('auth.partials.register')
                <x-slot:footer>
                    <x-dom.button type="closemodal" class="btn btn-secondary">
                        Close
                    </x-dom.button>
                    <x-dom.button type="submit" class="btn-success">
                        Sign Up
                    </x-dom.button>
                </x-slot:footer>
        </x-dom.modal>
    </main>
    @if ($errors->register->any())
        <script  type="module">
            $('#sign-up').modal('show');
            $( "#sign-in #message_errors" ).each(function() {
                $( this ).hide();
            });
        </script>
    @elseif ($errors->login->any())
        <script  type="module">
            $("#sign-in").modal('show');
            $( "#sign-up #message_errors" ).each(function() {
                $( this ).hide();
            });
        </script>
    @endif
@endsection
