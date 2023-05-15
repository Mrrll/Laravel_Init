<form action="{{$route}}" method="{{ (strtoupper($method) != 'POST' || strtoupper($method) != 'GET') ? 'POST' : $method }}" enctype="{{$type}}" onsubmit="return validateForm(event)">
    @csrf
    @if (strtoupper($method) != 'GET' && strtoupper($method) != 'POST')
        @method($method)
    @endif
    {{$slot}}
</form>
