@extends('layouts.plantilla')

@section('title', 'Welcome')

@section('content')
    <main class="container-fluid main-dashboard">
        <h1>Hola mundo</h1>
        <x-dom.modal name="sign-in" static="static" header="header" class="modal-dialog-centered">
            <x-slot:title class="bg-dark">
                <h1 class="modal-title fs-5" id="Label">Modal title</h1>
                <x-dom.button type="closemodal" class="btn-close"></x-dom.button>
            </x-slot:title>
            Contenido del modal
            <x-slot:footer>
                <x-dom.button type="closemodal" class="btn btn-secondary">
                    Cerrar
                </x-dom.button>
                <x-dom.button class="btn-success">
                    Siguiente
                </x-dom.button>
            </x-slot:footer>
        </x-dom.modal>
    </main>
@endsection
