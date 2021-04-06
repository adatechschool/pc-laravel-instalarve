<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(int $uid)
    {
      $user = User::where('id', $uid)->get();

      return view('users.show', [
         'user' => $user[0],
         'posts' => $user[0]->posts,
         'uid' => auth()->user()->id
      ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(int $user_id)
    {
        if (auth()->user()->id != $user_id) {
            return redirect()->route('posts.index');
        }
        $user = User::where("id", $user_id)->get();

      return view('users.edit', [
         'user_id' => $user_id,
         'user' => $user[0],
         'posts' => $user[0]->posts
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $user_id)
    {
        //
      $user = User::where("id", $user_id)->get();
      $user->toQuery()->update(array("biography" => $request->input('biography'),"profil_pic" => $request->input('profil_pic')));
      return redirect()->route('users.show', $user[0]->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
