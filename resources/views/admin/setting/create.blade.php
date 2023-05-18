@extends('layouts.dashboard')

@section('title', trans('Setting'))
@section('content')
    <main class="container-fluid main-dashboard">
        <h1>
            @lang('Setting')
        </h1>
        <x-dom.accordion name="settings">
            {{-- Ajustes de Apariencia de la Aplicación --}}
            <x-dom.accordion.accordion-item name="appearance">
                <x-slot:title>
                    @lang('Configure App Appearance')
                </x-slot:title>
                <x-dom.form :route="route('setting.appearance')" method="post">
                    <div class="grid align-items-center" style="--bs-gap: 1rem;">
                        {{-- Primera Seccion --}}
                        <div class="g-col-12 g-col-md-4">
                            {{-- Imagen por defecto --}}
                            <div id="preview_image" class="d-flex justify-content-center">
                                <div class="avatar">
                                <x-images.logo height="140px" width="140px"></x-images.logo>
                                </div>
                            </div>
                            {{-- Imagen del cambio --}}
                            <div class="form-group text-center g-col-12 g-col-md-4">
                                <img id="imgPreview" class="avatar d-none" height="140px" width="140px">
                            </div>
                        </div>
                        <div class="mb-3 g-col-12 g-col-md-8">
                            {{-- Input del imagen logo --}}
                            <label for="formFile" class="form-label">
                                @lang('Change the logo of the app')
                            </label>
                            <input class="form-control" type="file" id="formFile" name="logo" accept="image/png" onchange="previewImage(event, '#imgPreview', '#preview_image')">
                            @error('logo')
                                <small id="message_errors" class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="g-col-12">
                            <hr>
                        </div>
                        {{-- Segunda Seccion --}}
                        <div class="mb-3 g-col-12 g-col-md-6">
                            {{-- Selector del tema --}}
                            <x-dom.select id="select_theme" class="form-select-lg mb-3"  name="theme" onchange="SelectTheme(event, 'Select a theme')" title="Select a theme" label="Application theme">
                                <x-dom.select.option value="light">Light</x-dom.select.option>
                                <x-dom.select.option value="dark">Dark</x-dom.select.option>
                            </x-dom.select>
                        </div>
                        <div class="mb-3 g-col-12 g-col-md-6 text-center">
                            {{-- imagen preview del thema --}}
                            <label for="select_theme" class="form-label d-block">
                                @lang('Image preview of theme')
                            </label>
                            <img width="300px" height="300px" src="{{ asset('images/themes/theme_light.png')}}" alt="" id="theme_preview">
                        </div>
                        {{-- Tercera Seccion --}}
                        <div class="mb-3 g-col-12 text-end">
                            <hr>
                            {{-- Botón de Guardar la apariencia de la aplicación --}}
                            <x-dom.button type="submit" class="btn btn-success disabled" id="btn_appearance">
                                 @lang('Save') @lang('Appearance')
                            </x-dom.button>
                        </div>
                    </div>
                </x-dom.form>
            </x-dom.accordion.accordion-item>
        </x-dom.accordion>
    </main>
@endsection
