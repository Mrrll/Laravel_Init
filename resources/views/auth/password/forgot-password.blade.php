<x-dom.modal name="forgot-password" static="static" header="header" class="modal-dialog-centered" :route="route('password.email')" method="post">
    <x-slot:title>
        <h1 class="modal-title fs-5" id="forgot-password">
            @lang('Send Password Reset Link')
        </h1>
        <x-dom.button type="closemodal" class="btn-close"></x-dom.button>
    </x-slot:title>
    @include('auth.password.partials.forgot-password')
    <x-slot:footer>
        <x-dom.button type="closemodal" class="btn btn-secondary">
            @lang('Close')
        </x-dom.button>
        <x-dom.button type="submit" class="btn-success">
            @lang('Send')
        </x-dom.button>
    </x-slot:footer>
</x-dom.modal>
