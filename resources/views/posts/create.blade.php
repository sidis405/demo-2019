@extends('layouts.app')

@section('content')

    <h3>Add new post</h3>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('posts._form')

        <button type="submit" class="btn btn-block btn-success">Publish</button>
    </form>

@stop
