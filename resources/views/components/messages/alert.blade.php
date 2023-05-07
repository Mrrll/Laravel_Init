<div {{ $attributes->merge(['class' => "alert $clases alert-dismissible fade show"]) }} role="alert">
    <strong>{{ $title }}</strong> {{ $slot }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
