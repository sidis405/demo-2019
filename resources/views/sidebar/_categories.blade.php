<div class="card">
    <div class="card-header">
        <h4>Categories</h4>
    </div>
    <div class="card-body">
        <ul>
            @foreach($categories as $category)
                <li><a href="{{ route('categories.show', $category) }}">{{ $category->name }} ({{ $category->posts_count }})</a></li>
            @endforeach
        </ul>
    </div>
</div>
