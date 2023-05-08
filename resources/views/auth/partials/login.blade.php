<div class="mb-1">
    <x-dom.input type="email" label="Email" name="email" id="email" placeholder="you@example.com" :value="old('email')">
    </x-dom.input>
</div>
<div class="text-end mt-2">
    <small class="text-primary me-1">
        <x-dom.button type='modal' name="forgot-password" >
            Forgot your password?
        </x-dom.button>
        {{-- <a href="#">Forgot your password?</a> --}}
    </small>
</div>
<div class="mb-0">
    <x-dom.input type="password" label="Password" name="password" id="password" :value="old('password')">
    </x-dom.input>
</div>
<div class="mt-3 mb-1 text-center">
    <div class="form-check form-switch d-flex justify-content-center">
        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="remember">
        <label class="form-check-label ms-1" for="flexSwitchCheckDefault">Remember me !!!</label>
    </div>
</div>

