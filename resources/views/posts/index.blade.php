@extends('layouts.app')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h1>Home</h1>

    <p>
    <div>
        @auth
            <a href="/posts/create" class="btn btn-info">Create post</a>
        @endauth
        <form method="get" class="float-right">
            @csrf()
            <select id="select_theme" class="form-control col-12 bg-info text-white" name="theme_id">
                <option disabled selected value='' class="text-white">- - Select theme - -</option>
                <option value='0'> all</option>
                @foreach($themes as $theme)
                    <option name="" value={{$theme->id}}>
                        {{ $theme->name }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>
    </p>
    <div class="mb-3 clearfix"></div>

    <table class="table">
        <thead>
        <tr>
            <th style="width: 10%;">Score</th>
            <th style="width: 70%;">Title</th>
            <th style="width: 10%;">Date</th>
            <th style="width: 10%;">Comments</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>
                    <?php
                    $count_upvotes = DB::table('user_rated_posts')->where('post_id', $post->id)->where('voted', true)->count();
                    ?>
                    {{ $count_upvotes }}
                    @auth
                        @if(App\Post::userHasVoted($post->id, auth()->user()->id) == 1)
                            <img class="img-upvote" src="/imgs/upvote.png" style="max-height: 16px;max-width: 30px;margin-bottom: 7px;margin-left: 20px;" voted="1" post_id="{{ $post->id }}">
                            @else
                            <img class="img-upvote" src="/imgs/upvote.png" style="max-height: 16px;max-width: 30px; margin-bottom: 7px; margin-left: 20px;" voted="0" post_id="{{ $post->id }}">
                            @endif
                    @endauth
                </td>
                <td><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></td>
                <td>{{ date('d/m', strtotime($post->created_at)) }}</td>
                <td style="text-align: center;">
                    <?php
                    $count_comments = DB::table('comments')->where('post_id', $post->id)->count();
                    ?>
                    {{ $count_comments }}
                </td>
                {{--<td>--}}
                {{--@switch($post->status)--}}

                {{--@case(true)--}}
                {{--Aberto--}}
                {{--@break--}}
                {{--@case(false)--}}
                {{--Fechado--}}
                {{--@break--}}
                {{--@default--}}
                {{--Desconhecido--}}
                {{--@endswitch--}}
                {{--</td>--}}
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        {{ $posts->links() }}
        </tfoot>
    </table>
@endsection