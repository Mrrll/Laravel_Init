@switch($type)
    @case('textarea')
        <label class="ms-1" for="{{$id ?? '' }}">{{ $label }}</label>
        <textarea name="{{ $name }}" id="{{$id ?? ''}}" col="{{$col ?? ''}}"
        rows="{{$rows ?? ''}}"
        {{ $attributes->merge(['class' => "form-control $class "]) }}>
            {{ $value }}
        </textarea>
        @break
    @default
        @if ($type != 'hidden')
            <label class="ms-1" for="{{$id ?? ''}}" class="form-label">
                @lang($label)
            </label>
        @endif
        <input type="{{$type}}" id="{{$id ?? ''}}" name="{{$name}}" value="{{$value ?? ''}}" placeholder="{{$placeholder ?? ''}}" data-role="{{$datarole ?? ''}}"
        {{isset($readonly) ? $readonly : ''}}
        {{isset($disabled) ? $disabled : ''}}
        {{ $attributes->merge(['class' => "form-control $class"]) }}>
@endswitch
@empty($errors->getBags())
    @error($name)
        <small id="message_errors" class="text-danger">*{{ $message }}</small>
    @enderror
@else
    @foreach ($errors->getBags() as $key => $val)
        @empty($errors->$key->get($name))
        @else
            <small id="message_errors" class="text-danger">*{{ $errors->$key->first($name) }}</small>
        @endempty
    @endforeach
@endempty
