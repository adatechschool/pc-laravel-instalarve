<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
      $id_log = auth()->user()->id;
      $posts = Post::orderBy('created_at','desc')->paginate(50);
      return view('posts.index', [
         'posts' => $posts,
         'id_log' => $id_log
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $id = auth()->user()->id;

      $request->validate([
          'description' => 'required|string',
          'img_url' => 'required|string'
        ]);

      $post = Post::create(array(
          'user_id' => $id,
          'description' => $request->description,
          'img_url' => $request->img_url
      ));


      return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      $id_log = auth()->user()->id;
      return view('posts.show', [
         'post' => $post,
         'id_log' => $id_log
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(int $post_id)
    {
      $id_log = auth()->user()->id;
      $post = Post::where("id", $post_id);


      return view('posts.edit', [
         'post' => $post->get(),
         'post_id' => $post_id,
         'id_log' => $id_log
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $post_id)
    {
      $post = Post::where('id', $post_id)->get();

      $post->toQuery()->update(array("description" => $request->input('description'),"img_url" => $request->input('img_url')));



     // redirect with flash data to posts.show
     return redirect()->route('posts.show', $post[0]->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $post_id)
    {
      $post = Post::where('id', $post_id)->get();
      $post->toQuery()->delete();
      return redirect()->route('posts.index'); 
    }
}
