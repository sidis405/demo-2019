@extends('layouts.app')


@section('content')

    <h3>Latest posts tagged in *{{ $tag->name }}* ({{ $posts->total() }})</h3>

    @foreach($posts as $post)
        @include('posts._single')
    @endforeach

    {{ $posts->links() }}

@endsection
