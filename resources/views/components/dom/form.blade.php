<form action="{{$route}}" method="{{ (strtoupper($method) != 'POST' || strtoupper($method) != 'GET') ? 'POST' : $method }}" enctype="{{$type}}">
    @csrf
    @if (strtoupper($method) != 'GET')
        @method($method)
    @endif
    {{$slot}}
</form>
