@props(['route','method'])
<div class="modal fade" id="{{ $name }}" tabindex="-1" aria-labelledby="{{ $name }}Label" aria-hidden="true"
    {{ isset($static) ? $attributes->merge(['data-bs-backdrop' => "$static"]) : '' }}>
    <div {{ $attributes->merge(['class' => "modal-dialog $class"]) }}>
        <div class="modal-content">
            <x-dom.form :route="$route ?? ''" :method="$method ?? 'POST'">
                @isset($header)
                    <div {{ $attributes->class(['modal-header ' . $title->attributes->get('class')]) }} >
                        {{ $title ?? '' }}
                    </div>
                @endisset
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div
                    {{ isset($footer) ? $attributes->class(['modal-footer ' . $footer->attributes->get('class')]) : $attributes->class(['modal-footer']) }}>
                    {{ $footer }}
                </div>
            </x-dom.form>
        </div>
    </div>
</div>
