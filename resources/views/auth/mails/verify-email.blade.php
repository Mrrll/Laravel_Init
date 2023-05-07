@extends('layouts.plantilla')

@section('title', 'Email verify')

@section('content')
    <main class="container center_container main-dashboard">
        <x-messages.alert type="warning">
            <x-slot:title>
                <h4 class="alert-heading">Verify email!</h4>
            </x-slot:title>
            <x-dom.form :route="route('verification.send')" method="post">
                <p><strong>A message has been sent to your email, check your inbox!</strong> You must be <strong>verified</strong>, so that you can view the content of this website, being able to access the articles, exclusive content and the advantages for our users. you are one step away from being able to enjoy a unique experience,<strong> Forward !!</strong></p>
                <hr>
                <p class="mb-0">If the message has not reached you, make sure it is not in the <strong>spam tray</strong>, if not click on the next button and <strong>check your email</strong>. Please note that the link in the message will expire in 60 minutes. <button class="btn btn-warning"type="submit">Send new verification message</button></p>
            </x-dom.form>
        </x-messages.alert>
    </main>
@endsection
