<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Auth;

class BlogController extends Controller
{
    public function publicHomePage() {
      $posts = Blog::paginate(10);
      
      return view('blog/home', ['posts'=>$posts]);
    }  
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $loggedInUserId = Auth::id();
      $posts = Blog::all()->where('user_id', $loggedInUserId);
      
      return view('adminPanel/home', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminPanel/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $blog = new Blog;
      
      $postTitle = $request->title;
      $postBody = $request->body;
      $postUserId = Auth::id();
      
      $blog->user_id = $postUserId;
      $blog->title = $postTitle;
      $blog->body = $postBody;
      
      $blog->save();

      return redirect()->route('blogs.index');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Blog::find($id);
      
      $data = array(
        'id' => $id,
        'post' => $post
      );
      
      return view('blog.view_post', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $post = Blog::find($id);
      
      $commentCount = $request->commentCount;
      
      $post->comment_count = $commentCount;
      
      $post->save();
      
      return redirect()->route('blogs.show', ['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
