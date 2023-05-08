@props(['name', 'expanded' => 'true'])
<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button {{ ($expanded == 'false') ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
            data-bs-target="#{{$name}}" aria-expanded="{{$expanded}}" aria-controls="{{$name}}">
            {{$title}}
        </button>
    </h2>
    <div id="{{$name}}" class="accordion-collapse collapse {{ ($expanded == 'true') ? 'show' : '' }}">
        <div class="accordion-body">
            {{$slot}}
        </div>
    </div>
</div>
