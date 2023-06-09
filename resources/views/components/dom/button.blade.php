@switch($type)
    @case('link')
        @if ($tooltip != null && $tooltip != '')
            @php
                $text = trans($tooltip['text'])
            @endphp
        @endif
        <a href="{{$route ?? '#'}}" {{ $attributes->merge(['class' => "$class"]) }} id="{{$id ?? ''}}"
            @isset($tooltip)

                @if ($tooltip != null && $tooltip != '')
                    data-bs-toggle="tooltip"
                    data-bs-placement="{{$tooltip['position']}}"
                    @isset($tooltip['class'])
                        data-bs-custom-class="{{$tooltip['class']}}"
                    @endisset
                    data-bs-title="{{$text}}"
                @endif
            @endisset
            > {{$slot}} </a>
        @break
    @case('modal')
        @if ($tooltip != null && $tooltip != '')
            @php
                $text = trans($tooltip['text'])
            @endphp
        @endif
        <button type="button" {{ $attributes->merge(['class' => "btn $class"]) }} data-bs-toggle="modal" data-bs-target="#{{$name}}" id="{{$id ?? ''}}"
            @isset($tooltip)
                data-bs-toggle="tooltip"
                data-bs-placement="{{$tooltip['position']}}"
                @isset($tooltip['class'])
                    data-bs-custom-class="{{$tooltip['class']}}"
                @endisset
                data-bs-title="{{$text}}"
            @endisset
            >
            {{$slot}}
        </button>
        @break
    @case('closemodal')
        @if ($tooltip != null && $tooltip != '')
            @php
                $text = trans($tooltip['text'])
            @endphp
        @endif
        <button type="button" {{ $attributes->merge(['class' => "$class"]) }} data-bs-dismiss="modal" id="{{$id ?? ''}}"
            @isset($tooltip)
                @if ($tooltip != null && $tooltip != '')
                    data-bs-toggle="tooltip"
                    data-bs-placement="{{$tooltip['position']}}"
                    @isset($tooltip['class'])
                        data-bs-custom-class="{{$tooltip['class']}}"
                    @endisset
                    data-bs-title="{{$text}}"
                @endif
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
    @if ($tooltip != null && $tooltip != '')
        @php
            $text = trans($tooltip['text'])
        @endphp
    @endif
    <button type="{{$type}}" {{ $attributes->merge(['class' => "btn $class"]) }} id="{{$id ?? ''}}"
        @isset($tooltip)
            @if ($tooltip != null && $tooltip != '')
                data-bs-toggle="tooltip"
                data-bs-placement="{{$tooltip['position']}}"
                @isset($tooltip['class'])
                    data-bs-custom-class="{{$tooltip['class']}}"
                @endisset
                data-bs-title="{{$text}}"
            @endif
        @endisset
        >
        {{$slot}}
    </button>
@endswitch
