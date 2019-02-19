<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Article title" value="{{ old('title', $post->title) }}">
</div>

<div class="form-group">
    <label for="cover">Article cover</label>
    <input type="file" class="form-control" name="cover">
</div>

<div class="form-group">
    <label for="preview">Preview</label>
    <textarea name="preview" cols="30" rows="2" class="form-control">{{ old('preview', $post->preview) }}</textarea>
</div>

<div class="form-group">
    <label for="preview">Article body</label>
    <textarea name="body" cols="30" rows="4" class="form-control">{{ old('body', $post->body) }}</textarea>
</div>

<div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" id="" class="form-control">
        <option value=""></option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @if($category->id == old('category_id', $post->category_id) ) selected="" @endif>{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="tags">Tags</label>
    <select name="tags[]" class="form-control" multiple="">
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}" @if(in_array($tag->id,
                old('tags', $post->tags->pluck('id')->toArray()))
                ) selected="" @endif  >{{ $tag->name }}</option>
        @endforeach
    </select>
</div>
