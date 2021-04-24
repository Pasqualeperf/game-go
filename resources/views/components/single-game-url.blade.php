<a {{ $attributes->merge() }} href="{{route('single-game', $slug)}}">
    {{$slot}}
</a>
