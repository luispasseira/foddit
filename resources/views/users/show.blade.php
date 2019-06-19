@extends('layouts.app')

@section('content')
    <p>
    <form action="/users/{{ $user->id }}" method="post">
        <a href="/users" class="btn btn-info">Back</a>
        @if($user->user_roles_id != 1)
            <a href="/users/{{ $user->id }}/edit" class="btn btn-success">Edit</a>
            @method("DELETE")
            @csrf
            <input type="submit" class="btn btn-danger" value="Change status">
        @endif
    </form>
    </p>
    <table class="table">
        <thead>
        <tr>
            <th style="width: 40%;">Username</th>
            <th style="width: 45%;">E-mail</th>
            <th style="width: 15%;">Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if($user->user_role_id == 1)
                    Blocked
                @else
                    Active
                @endif
            </td>
        </tr>
        </tbody>
    </table>
@endsection