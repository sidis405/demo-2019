@extends('layouts.app')


@section('content')

    <h3>{{ __('blog.latest_posts') }} ({{ $posts->total() }})</h3>

    @foreach($posts as $post)
        @include('posts._single')
    @endforeach


    {{ $posts->links() }}

@endsection
