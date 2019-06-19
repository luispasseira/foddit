<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Theme;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status', true)->paginate(15);
        $themes = Theme::all();
        return view('posts.index')->with(compact("posts"))->with(compact("themes"));
    }

    /**
     * Display a listing of the resource with filter.
     *
     * @return \Illuminate\Http\Response
     */
    public function sortByTheme($id)
    {
        $posts = Post::where('status', true)->where('theme_id', $id)->paginate(15);
        $themes = Theme::all();

        if ($id == 0) {
            return redirect('/posts');
        } else {
            return view('posts.index')->with(compact("posts"))->with(compact("themes"));
        }
    }


    public function showUserPosts($id)
    {
        $user = User::find($id)->get();
        $posts = $user->posts();
        return view('posts.index_user_posts')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post;
        $themes = Theme::all();
        return view('posts.create')->with(compact('post'))->with(compact('themes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->theme_id == null) {

            $theme = new Theme();
            $theme->name = $request->theme_name;
            $theme->save();
        } else {
            $theme = Theme::find($request->theme_id);
        }

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $post->theme_id = $theme->id;
        $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user_id = Auth::id();
        return view('posts.show')->with(compact("post"))->with(compact("user_id"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with(compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        try {
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();
            return redirect('/posts/' . $post->id);
        } catch (\Exception $ex) {
            return redirect('/posts')->with('alert', 'Não foi possível editar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            $post->status = false;
            $post->save();
        } catch (\Exception $exception) {
            return redirect('/posts')->with('error', 'Unable to archive!');
        }

        return redirect('/posts');
    }

    public function theme_exists($name)
    {

    }
}
