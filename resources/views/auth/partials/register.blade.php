<div class="mb-1">
    <x-dom.input type="text" label="Name" name="name" id="name" placeholder="You Name" :value="old('name')">
    </x-dom.input>
</div>
<div class="mb-1">
    <x-dom.input type="email" label="Email" name="email" id="email" placeholder="you@example.com" :value="old('email')">
    </x-dom.input>
</div>
<div class="mb-0">
    <x-dom.input type="password" label="Password" name="password" id="password">
    </x-dom.input>
</div>
<div class="mb-0">
    <x-dom.input type="password" label="Password Confirmation" name="password_confirmation" id="password_confirmation">
    </x-dom.input>
</div>
