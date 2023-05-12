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
                <x-dom.form :route="route('setting.appearance')" method="post">
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
                            <input class="form-control" type="file" id="formFile" name="logo" accept="image/png">
                            @error('logo')
                                <small id="message_errors" class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="g-col-12">
                            <hr>
                        </div>
                        <div class="mb-3 g-col-12 g-col-md-6">
                            <label for="select_theme" class="form-label">Application theme</label>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="select_theme" name="theme">
                                <option selected>Open this select menu</option>
                                <option value="light">Light</option>
                                <option value="dark">Dark</option>
                                <option value="peyra">Peyra</option>
                            </select>
                        </div>
                        <div class="mb-3 g-col-12 g-col-md-6 text-center">
                            <label for="select_theme" class="form-label d-block">Image preview of theme</label>
                            <img width="300px" height="300px" src="{{ asset('images/themes/theme_dark.png')}}" alt="">
                        </div>
                        <div class="mb-3 g-col-12 text-end">
                            <hr>
                            <x-dom.button type="submit" class="btn btn-success"> Save Appearance </x-dom.button>
                        </div>
                    </div>
                </x-dom.form>
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
