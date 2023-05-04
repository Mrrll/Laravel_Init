<div class="toast-container position-fixed top-0 end-0 p-3 ">
    <div id="liveToast" class="toast text-bg-{{$type}}" role="alert" aria-live="assertive" aria-atomic="true"
        dat-bs-animation="true">
        <div class="toast-header text-bg-{{$type}}">
            <img class="rounded me-2">
            <strong class="me-auto">{{$title ?? ''}}</strong>
                <small id="date"> </small>
            <button type="button" {{ $attributes->class(['btn-close', 'btn-close-white' => $type != 'info']) }} data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{$slot}}
        </div>
    </div>
</div>
<script type="module" defer>
    let dt = new Date();
    let time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    $('#date').html(time);
    const toastLiveExample = document.getElementById('liveToast')
    if (toastLiveExample) {
         const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        toastBootstrap.show()
    }
</script>
