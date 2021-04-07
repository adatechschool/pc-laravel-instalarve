<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
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
      $uid = auth()->user()->id;
      $request->validate([
          'post_id' => 'required|integer'
        ]);

      // $matchThese = ['post_id' => $request->post_id , 'user_id' => $uid];
      // $likeExist = Like::select('*')
      //           ->where('post_id', '=', $request->post_id)
      //           ->where('user_id', '=', $uid)
      //           ->get();

      $likeExist = Like::where(['post_id' => $request->post_id , 'user_id' => $uid])->get();
      print_r($likeExist);

        if ($likeExist->count() == 0){
          $like = Like::create(array(
          'user_id' => $uid,
          'post_id' => $request->post_id
        ));
      } else {
          $likeExist[0]->delete();
        }




        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
