<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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
      $post = Post::find($request->post_id);



      if ($post->isLikedByLoggedUser()){
        $res = Like::where([
                'post_id' => $request->post_id ,
                'user_id' => auth()->user()->id
              ])->delete();
        if($res){
          return response()->json(['count' => Post::find($request->post_id)->likes->count()]);
        }

      } else {
        $like = Like::create(array(
        'user_id' => auth()->user()->id,
        'post_id' => $request->post_id
      ));
      return response()->json(['count' => Post::find($request->post_id)->likes->count()]);
      }

    }

    //
    // public function store(Request $request)
    // {
    //   $uid = auth()->user()->id;
    //
    //
    //
    //   $likeExist = Like::where(['post_id' => $request->post_id , 'user_id' => $uid])->get();
    //
    //
    //     if ($likeExist->count() == 0){
    //       $like = Like::create(array(
    //       'user_id' => $uid,
    //       'post_id' => $request->post_id
    //     ));
    //
    //   } else {
    //       $likeExist[0]->delete();
    //
    //     }
    //
    //
    //   return redirect('posts');
    //
    //
    // }
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
