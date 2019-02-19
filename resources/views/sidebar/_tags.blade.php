<div class="card">
    <div class="card-header">
        <h4>Tags</h4>
    </div>
    <div class="card-body">
            @foreach($tags as $tag)
                <a href="{{ route('tags.show', $tag) }}"><span style="font-size: {{ $tag->posts_count }}px">{{ $tag->name }}</span></a>
            @endforeach
    </div>
</div>
