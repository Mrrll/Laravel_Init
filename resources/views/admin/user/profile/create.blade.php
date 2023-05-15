@extends('layouts.dashboard')

@section('title', 'Profile')
@section('content')
    <main class="container-fluid main-dashboard">
        <h1>Profile</h1>
        <x-dom.form :route="route('profile.store')" method="post">
            <div class="grid align-items-center" style="--bs-gap: 1rem;"">
                {{-- Primera Seccion --}}
                <div class="g-col-12 g-col-md-4">
                    <div id="preview_avatar" class="d-flex justify-content-center">
                        <div class="avatar">
                            <x-images.avatar height="140px" width="140px"></x-images.avatar>
                        </div>
                    </div>
                    {{-- Imagen del cambio --}}
                    <div class="form-group text-center g-col-12 g-col-md-4">
                        <img id="avatarPreview" class="avatar d-none" height="140px" width="140px">
                    </div>
                </div>
                <div class="mb-3 g-col-12 g-col-md-8">
                    {{-- Input del imagen logo --}}
                    <label for="avatarFile" class="form-label">Change your avatar</label>
                    <input class="form-control" type="file" id="avatarFile" name="avatar" accept="image/png"
                        onchange="previewImage(event, '#avatarPreview', '#preview_avatar')">
                    @error('avatar')
                        <small id="message_errors" class="text-danger">*{{ $message }}</small>
                    @enderror
                </div>
                <div class="g-col-12">
                    <hr>
                </div>
                {{-- Segunda Seccion --}}
                <div class="g-col-12 g-col-md-6">
                    <x-dom.input label="First Name" type="text" name="first_name" id="first_name"
                        placeholder="First Name" :value="old('first_name')"></x-dom.input>
                </div>
                <div class="g-col-12 g-col-md-6">
                    <x-dom.input label="Second Name" type="text" name="second_name" id="second_name"
                        placeholder="Second Name" :value="old('second_name')"></x-dom.input>
                </div>
                <div class="g-col-12 g-col-md-3">
                    <x-dom.input label="Identity" type="text" name="identify" id="identify" placeholder="00000000-X"
                        :value="old('identify')"></x-dom.input>
                </div>
                <div class="g-col-12 g-col-md-3">
                    <x-dom.input label="Country" type="text" name="country" id="country" placeholder="Spain"
                        :value="old('country')"></x-dom.input>
                </div>
                <div class="g-col-12 g-col-md-3">
                    <x-dom.input label="City" type="text" name="city" id="city" placeholder="Barcelona"
                        :value="old('city')"></x-dom.input>
                </div>
                <div class="g-col-12 g-col-md-3">
                    <x-dom.input label="Municipality" type="text" name="municipality" id="municipality"
                        placeholder="Castelldefels" :value="old('municipality')"></x-dom.input>
                </div>
                <div class="g-col-12 g-col-md-12">
                    <x-dom.input label="Address" type="text" name="address" id="address"
                        placeholder="Carrer 14 Bis, 2, 08860" :value="old('address')"></x-dom.input>
                </div>
                <div class="g-col-12 g-col-md-6">
                    <x-dom.input label="First phone" type="text" name="first_phone" id="first_phone"
                        placeholder="699 999 666" :value="old('first_phone')"></x-dom.input>
                </div>
                <div class="g-col-12 g-col-md-6">
                    <x-dom.input label="Second phone" type="text" name="second_phone" id="second_phone"
                        placeholder="93 999 66 66" :value="old('second_phone')"></x-dom.input>
                </div>
                <div class="mb-3 g-col-12 text-end">
                    <hr>
                    {{-- Botón de Guardar el perfil de usuario --}}
                    <x-dom.button type="submit" class="btn btn-success disabled" id="btn_profile"> Save Profile
                    </x-dom.button>
                </div>
            </div>
        </x-dom.form>
    </main>
@endsection
