@extends('layouts.app')

@section('content')
<h1>Edit post</h1>
<form action="/posts/{{ $post->id }}" method="post">
    @method('put')
    @include('posts.form')
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection