@if (session('message'))
    <x-messages.toast type="{{session('message')['type'] ?? 'info'}}">
        <x-slot:title>
            {{session('message')['title'] ?? ''}}
        </x-slot:title>
        {{session('message')['message'] ?? ''}}
    </x-messages.toast>
@endif
