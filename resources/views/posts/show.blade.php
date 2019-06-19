@extends('layouts.app')

@section('content')
    <p>
    <form action="/posts/{{ $post->id }}" method="post">
        <a href="/posts/" class="btn btn-info">Back</a>
        @if($user_id == $post->user->id)
            @if($post->status == true)
                <a href="/posts/{{ $post->id }}/edit" class="btn btn-success">Edit</a>
                @method("DELETE")
                @csrf
                <input type="submit" class="btn btn-danger" value="Archive">
            @endif
        @endif
    </form>
    </p>
    <h1>{{ $post->title }}</h1>
    <h6> {{ $post->user->username}}</h6><br>
    <div class="form-group">

        @if(empty($post->body ))
            <pre class="form-control" style="background: #e8ecef">No details needed... :(</pre>
        @else
            <pre class="form-control" style="background: #e8ecef">{{ $post->body }}</pre>
        @endif
    </div>

    <br>

    <div class="form-group">
        @if($post->status == true)
            @if(sizeof($post->comments) != 0)
                @foreach ($post->comments as $comment)
                    <br><p>{{ $comment->user->username }}</p>
                    <pre class="form-control" style="background: #e8ecef">{{ $comment->body }}</pre>
                @endforeach
            @else
                <br><p>Be the first to comment! :)</p>
            @endif

            @guest
                <a class="btn btn-info" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="btn btn-info" href="{{ route('register') }}">{{ __('Register') }}</a>
            @else
                <form action="/comments/create/{{ $post->id }}" method="get">
                    <div class="form-group">
                        <input hidden name="post_id" value="{{ $post->id }}">
                    </div>

                    <div class="form-group">
                        <label>Comment</label>
                        <textarea type="text" name="body" class="form-control" placeholder="Say something positive! :)"
                                  onkeyup="textAreaAdjust(this)" style="overflow:hidden"></textarea>
                        <script>
                            function textAreaAdjust(o) {
                                o.style.height = "1px";
                                o.style.height = (25 + o.scrollHeight) + "px";
                            }
                        </script>
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            @endguest
        @endif
    </div>
@endsection