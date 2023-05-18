<form action="{{$route}}" method="{{ (strtoupper($method) != 'POST' || strtoupper($method) != 'GET') ? 'POST' : $method }}" enctype="{{$type}}"
@if ($valid)
    onsubmit="return validateForm(event)"
@endif
>
    @csrf
    @if (strtoupper($method) != 'GET' && strtoupper($method) != 'POST')
        @method($method)
    @endif
    {{$slot}}
</form>
