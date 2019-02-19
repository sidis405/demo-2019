@extends('layouts.app')

@section('content')

    <h3>{{ __('blog.edit_post') }}</h3>

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @include('posts._form')

        <button type="submit" class="btn btn-block btn-warning">Update</button>
    </form>

     @can('delete', $post)
        <hr>
        <form action="{{ route('posts.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    @endcan
@stop
