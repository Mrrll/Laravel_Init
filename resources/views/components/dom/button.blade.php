@switch($type)
    @case('link')
        <a href="{{$route ?? '#'}}" {{ $attributes->merge(['class' => "$class"]) }} id="{{$id ?? ''}}"
            @isset($tooltip)
                data-bs-toggle="tooltip"
                data-bs-placement="{{$tooltip['position']}}"
                @isset($tooltip['class'])
                    data-bs-custom-class="{{$tooltip['class']}}"
                @endisset
                data-bs-title="{{$tooltip['text']}}"
            @endisset
            > {{$slot}} </a>
        @break
    @case('modal')
        <button type="button" {{ $attributes->merge(['class' => "btn $class"]) }} data-bs-toggle="modal" data-bs-target="#{{$name}}" id="{{$id ?? ''}}"
            @isset($tooltip)
                data-bs-toggle="tooltip"
                data-bs-placement="{{$tooltip['position']}}"
                @isset($tooltip['class'])
                    data-bs-custom-class="{{$tooltip['class']}}"
                @endisset
                data-bs-title="{{$tooltip['text']}}"
            @endisset
            >
            {{$slot}}
        </button>
        @break
    @case('closemodal')
        <button type="button" {{ $attributes->merge(['class' => "$class"]) }} data-bs-dismiss="modal" id="{{$id ?? ''}}"
            @isset($tooltip)
                data-bs-toggle="tooltip"
                data-bs-placement="{{$tooltip['position']}}"
                @isset($tooltip['class'])
                    data-bs-custom-class="{{$tooltip['class']}}"
                @endisset
                data-bs-title="{{$tooltip['text']}}"
            @endisset
            >
            {{$slot}}
        </button>
        @break
    @case('dropdown')
        <a {{ $attributes->merge(['class' => "dropdown-toggle $class"]) }} data-bs-toggle="dropdown" aria-expanded="false" id="{{$id ?? ''}}">
            {{$slot}}
        </a>
        @break
    @case('collapse')
        <a {{ $attributes->merge(['class' => "$class"]) }} data-bs-toggle="collapse" href="#{{$name}}" role="button" aria-expanded="false" aria-controls="{{$name}}" id="{{$id ?? ''}}">
            {{$slot}}
        </a>
        @break
    @default
    <button type="{{$type}}" {{ $attributes->merge(['class' => "btn $class"]) }} id="{{$id ?? ''}}"
        @isset($tooltip)
            data-bs-toggle="tooltip"
            data-bs-placement="{{$tooltip['position']}}"
            @isset($tooltip['class'])
                data-bs-custom-class="{{$tooltip['class']}}"
            @endisset
            data-bs-title="{{$tooltip['text']}}"
        @endisset
        >
        {{$slot}}
    </button>
@endswitch
