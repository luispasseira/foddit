<?php

namespace App\Http\Controllers;

use App\UserRatedPost;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRatedPostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($post_id)
    {
        $upvote = UserRatedPost::where('post_id', $post_id)->where('user_id', Auth::id())->first();
        if ($upvote) {
            if ($upvote->voted == true) {
                $upvote->voted = false;

            } else {
                $upvote->voted = true;
            }
        } else {
            $upvote = new UserRatedPost();
            $upvote->user_id = Auth::id();
            $upvote->post_id = $post_id;

            $upvote->voted = true;

        }

        $upvote->save();

        $json_response = new JsonResponse();
        $json_response->setStatusCode(200);
        $json_response->setData(array('message' => "tou"));

        return $json_response;
    }
}
