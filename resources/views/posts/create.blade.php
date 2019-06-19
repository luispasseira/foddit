@extends('layouts.app')

@section('content')
    <h1>New post</h1>
    <form action="/posts" method="post">
        @include('posts.form')
        <button type="submit" class="btn btn-info">Post</button>
    </form>
@endsection