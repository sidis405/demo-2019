@extends('layouts.app')


@section('content')

    <h3>Latest posts categories in *{{ $category->name }}* ({{ $posts->total() }})</h3>

    @foreach($posts as $post)
        @include('posts._single')
    @endforeach


    {{ $posts->links() }}

@endsection
