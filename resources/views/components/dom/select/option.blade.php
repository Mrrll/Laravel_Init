@props(['value', 'selected' => 'null', 'id' => 'null'])
<option value="{{$value}}"
@if($selected != null)
    @selected(old($id, $selected) == $value )>
@endif
{{$slot}}
</option>
