@extends('layouts.mail')

@section('content')
    <main class="container-fluid main-dashboard center_container">
        <div class="grid align-items-center justify-items-center" style="--bs-gap: 1rem;">
            <div class="g-col-12 mt-2 text-center">
                <x-images.logo height="100px" width="100px"></x-images.logo>
            </div>
            <div class="g-col-12 mt-3 ps-3 pe-3">
                <x-dom.card>
                    @if (!empty($greeting))
                        # {{ $greeting }}
                    @else
                        @if ($level === 'error')
                            <h5 class="card-title">
                                <strong>
                                    @lang('Whoops!')</h5>
                                </strong>
                        @else
                            <h5 class="card-title">
                                <strong>
                                    @lang('Hello!')</h5>
                                </strong>
                        @endif
                    @endif
                    {{-- Intro Lines --}}
                    @foreach ($introLines as $line)
                        <p class="card-text">
                            {{ $line }}
                        </p>
                    @endforeach
                    {{-- Action Button --}}
                    @isset($actionText)
                        <?php
                        $color = match ($level) {
                            'success', 'error' => $level,
                            default => 'primary',
                        };
                        ?>
                        <div class="text-center mt-3 mb-3">
                            <x-dom.button type="link" :route="$actionUrl" class="btn btn-primary">{{ $actionText }}
                            </x-dom.button>
                        </div>
                    @endisset
                    {{-- Outro Lines --}}
                    @foreach ($outroLines as $line)
                        <p class="card-text">
                            {{ $line }}
                        </p>
                    @endforeach
                    {{-- Salutation --}}
                    @if (!empty($salutation))
                        <p class="card-text">
                            {{ $salutation }}
                        </p>
                    @else
                        <p class="card-text">
                            @lang('Regards'),<br>
                        </p>
                        <p class="card-text">
                            {{ config('app.name') }}
                        </p>
                    @endif
                    <hr>
                    {{-- Subcopy --}}
                    @isset($actionText)
                            <p class="card-text">
                                @lang("If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n" . 'into your web browser:', [
                                    'actionText' => $actionText,
                                ]) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
                            </p>
                    @endisset
                </x-dom.card>
            </div>
        </div>
    </main>
@endsection
