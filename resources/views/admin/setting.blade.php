@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('content')
    <main class="container-fluid main-dashboard">
        <h1>Setting</h1>
        <x-dom.accordion name="settings">
            <x-dom.accordion.accordion-item name="appearance">
                <x-slot:title>
                    Configure App Appearance
                </x-slot:title>
                <div class="grid align-items-center" style="--bs-gap: 1rem;">
                    <div class="g-col-12 g-col-md-4">
                        <div id="preview_image" class="d-flex justify-content-center">
                            <div class="avatar">
                               <x-images.logo height="140px" width="140px"></x-images.logo>
                            </div>
                        </div>
                        <div class="form-group text-center g-col-12 g-col-md-4">
                            <img id="imgPreview" class="avatar d-none">
                        </div>
                    </div>
                    <div class="mb-3 g-col-12 g-col-md-8">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
            </x-dom.accordion.accordion-item>
            <x-dom.accordion.accordion-item name="company" expanded="false">
                <x-slot:title>
                    Advanced Company Setting
                </x-slot:title>
                <div class="grid align-items-center" style="--bs-gap: 1rem;">
                    <div class="g-col-12 g-col-md-4">
                        <div id="preview_image" class="d-flex justify-content-center">
                            <div class="avatar">
                               <x-images.logo height="140px" width="140px"></x-images.logo>
                            </div>
                        </div>
                        <div class="form-group text-center g-col-12 g-col-md-4">
                            <img id="imgPreview" class="avatar d-none">
                        </div>
                    </div>
                    <div class="mb-3 g-col-12 g-col-md-8">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
            </x-dom.accordion.accordion-item>
        </x-dom.accordion>
    </main>
@endsection
