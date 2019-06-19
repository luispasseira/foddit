<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('user_role_id', '!=', '121')->paginate(15);

        return view('users.index')->with(compact("users"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with(compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $user->username = $request->username;
            $user->email = $request->email;
            $user->save();
            return redirect('/users/' . $user->id);

        } catch (\Exception $ex) {
            return redirect('/users')->with('error', 'Could not edit!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            if($user->user_role_id != 1){
                $user->user_role_id = 1;
            }else{
                $user->user_role_id = 21;
            }
            $user->save();
        } catch (\Exception $ex) {
            dd($ex);
            return redirect('/users')->with('error', 'Unable to delete!');
        }

        return redirect('/users');
    }
}
