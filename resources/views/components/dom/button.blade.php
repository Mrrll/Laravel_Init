@switch($type)
    @case('link')
        <a href="{{$route ?? '#'}}" {{ $attributes->merge(['class' => "$class"]) }}> {{$slot}} </a>
        @break
    @case('modal')
        <button type="button" {{ $attributes->merge(['class' => "btn $class"]) }} data-bs-toggle="modal" data-bs-target="#{{$name}}">
            {{$slot}}
        </button>
        @break
    @case('closemodal')
        <button type="button" {{ $attributes->merge(['class' => "$class"]) }} data-bs-dismiss="modal">
            {{$slot}}
        </button>
        @break
    @default
    <button type="{{$type}}" {{ $attributes->merge(['class' => "btn $class"]) }}>
        {{$slot}}
    </button>
@endswitch
