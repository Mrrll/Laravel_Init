@extends('layouts.plantilla')

@section('title', 'Email verify')

@section('content')
    <main class="container center_container main-dashboard">
        <x-messages.alert type="warning">
            <x-slot:title>
                <h4 class="alert-heading">@lang('Verify Your Email Address')!</h4>
            </x-slot:title>
            <x-dom.form :route="route('verification.send')" method="post" :valid="false">
                <p><strong>@lang('Verify Email Address')</strong> @lang('Before proceeding, please check your email for a verification link.')</p>
                <hr>
                <p class="mb-0">@lang('If you did not receive the email')
                    @lang('click here to request another'), <button class="btn btn-warning"type="submit">@lang('Send new notification for email verification') </button>
                    <strong>@lang('The link will expire in :count minutes.', ['count' => '60'])</strong>
                </p>
            </x-dom.form>
        </x-messages.alert>
    </main>
@endsection
