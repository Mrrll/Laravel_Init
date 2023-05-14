@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('content')
    <main class="container-fluid main-dashboard">
        <h1>Setting</h1>
        <x-dom.accordion name="settings">
            {{-- Ajustes de Apariencia de la Aplicación --}}
            <x-dom.accordion.accordion-item name="appearance">
                <x-slot:title>
                    Configure App Appearance
                </x-slot:title>
                <x-dom.form :route="route('setting.appearance.update', $setting)" method="patch">
                    <div class="grid align-items-center" style="--bs-gap: 1rem;">
                        {{-- Primera Seccion --}}
                        <div class="g-col-12 g-col-md-4">
                            {{-- Imagen por defecto --}}
                            <div id="preview_image" class="d-flex justify-content-center">
                                <div class="avatar">
                                    @isset($setting->image)
                                        <img height="140px" width="140px" src="{{asset($setting->image->first()->url)}}">
                                    @else
                                        <x-images.logo height="140px" width="140px"></x-images.logo>
                                    @endisset
                                </div>
                            </div>
                            {{-- Imagen del cambio --}}
                            <div class="form-group text-center g-col-12 g-col-md-4">
                                <img id="imgPreview" class="avatar d-none" height="140px" width="140px">
                            </div>
                        </div>
                        <div class="mb-3 g-col-12 g-col-md-8">
                            {{-- Input del imagen logo --}}
                            <label for="formFile" class="form-label">Default file input example</label>
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
                                <x-dom.select.option value="light" selected="{{$setting->theme}}" id="select_theme">Light</x-dom.select.option>
                                <x-dom.select.option value="dark" selected="{{$setting->theme}}" id="select_theme">Dark</x-dom.select.option>
                                <x-dom.select.option value="peyra" selected="{{$setting->theme}}" id="select_theme">Peyra</x-dom.select.option>
                            </x-dom.select>
                            {{-- <label for="select_theme" class="form-label">Application theme</label>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="select_theme" name="theme" onchange="SelectTheme(event)">
                                <option selected>Open this select menu</option>
                                <option value="light" @selected(old('select_theme', $setting->theme) == "light" )>Light</option>
                                <option value="dark" @selected(old('select_theme', $setting->theme) == "dark" )>Dark</option>
                                <option value="peyra" @selected(old('select_theme', $setting->theme) == "peyra" )>Peyra</option>
                            </select> --}}
                        </div>
                        <div class="mb-3 g-col-12 g-col-md-6 text-center">
                            {{-- imagen preview del thema --}}
                            <label for="select_theme" class="form-label d-block">Image preview of theme</label>
                            <img width="300px" height="300px" src="{{ asset('images/themes/theme_'.$setting->theme.'.png')}}" alt="" id="theme_preview">
                        </div>
                        {{-- Tercera Seccion --}}
                        <div class="mb-3 g-col-12 text-end">
                            <hr>
                            {{-- Botón de Guardar la apariencia de la aplicación --}}
                            <x-dom.button type="submit" class="btn btn-success disabled" id="btn_appearance"> Save Appearance </x-dom.button>
                        </div>
                    </div>
                </x-dom.form>
            </x-dom.accordion.accordion-item>
        </x-dom.accordion>
    </main>
@endsection
