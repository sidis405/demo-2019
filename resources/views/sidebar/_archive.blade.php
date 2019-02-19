<div class="card">
    <div class="card-header">
        <h4>Archive (last year)</h4>
    </div>
    <div class="card-body">
        <ul>
            @foreach($archive as $month)
                <li><a href="{{ route('posts.index') }}?month={{ $month->month }}&year={{ $month->year }}">{{ $month->month }} {{ $month->year }} ({{ $month->published }})</a></li>
            @endforeach
        </ul>
    </div>
</div>
