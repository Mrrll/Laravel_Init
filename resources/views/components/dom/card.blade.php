@props(['route','method'])
<div {{ $attributes->class(['card ' .$class]) }}>
    <x-dom.form :route="$route ?? ''" :method="$method ?? 'POST'">
        @isset($header)
            <div {{ $attributes->class(['card-header ' . $header->attributes->get('class')]) }}>
                {{ $header ?? '' }}
            </div>
        @endisset
        <div class="card-body">
            {{$slot}}
        </div>
        @isset($footer)
            <div {{ $attributes->class(['card-footer text-body-secondary ' . $footer->attributes->get('class')]) }}>
                {{ $footer ?? '' }}
            </div>
        @endisset
    </x-dom.form>
</div>
