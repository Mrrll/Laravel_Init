@if($label != null)
    <label for="{{$id ?? ''}}" class="form-label">{{$label}}</label>
@endif
<select {{ $attributes->merge(['class' => "form-select $class"]) }}class="form-select form-select-lg mb-3" aria-label=".{{$class}}" id="{{$id}}" name="{{$name}}"
    onchange="{{$onchange ?? ''}}">
    <option selected>{{$title}}</option>
    {{$slot}}
    {{-- <option value="light" @selected(old('select_theme', $setting->theme) == 'light')>Light</option>
    <option value="dark" @selected(old('select_theme', $setting->theme) == 'dark')>Dark</option>
    <option value="peyra" @selected(old('select_theme', $setting->theme) == 'peyra')>Peyra</option> --}}
</select>
