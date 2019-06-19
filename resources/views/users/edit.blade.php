@extends('layouts.app')

@section('content')
<h1>Edit post</h1>
<form action="/users/{{ $user->id }}" method="post">
    @method('put')
    @include('users.form')
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection