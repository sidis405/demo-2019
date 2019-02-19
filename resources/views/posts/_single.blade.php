<div class="card">
        <img src="{{ $post->cover }}" style="width: 100%">
    <div class="card-header">
        @can('update', $post)
            <a class="btn btn-xs btn-default" style="position:absolute; right:10px" href="{{ route('posts.edit', $post) }}">Edit</a>
        @endcan

        <h4><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h4>

        <small>
            <span>by <strong>{{ $post->user->name }}</strong></span>
            <span>on <strong>{{ $post->category->name }}</strong></span>
            <span>at <strong>{{ $post->created_at->format('d F \'y H:i') }}</strong></span>
        </small>
    </div>
    <div class="card-body">
        {{ $post->preview }}
    </div>
    <div class="card-footer">
        <small>
            # {{ $post->tags->pluck('name')->implode(', ') }}
        </small>
    </div>
</div>

<hr>
