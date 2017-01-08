<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Auth;

class BlogController extends Controller
{
    public function publicHomePage(Request $request) {
      if ($request->input('type') == 'recentPosts') {
        $posts = Blog::orderBy('created_at', 'desc')->paginate(10);
        $organization = 'Top 10 Most Recent Posts';
      } else if ($request->input('type') == 'mostCommented') {
        $posts = Blog::orderBy('comment_count', 'desc')->paginate(10);
        $organization = 'Top 10 Most Commented Posts';
      } else if ($request->input('type') == 'mostVisited') {
        $posts = Blog::orderBy('visit_count', 'desc')->paginate(10);
        $organization = 'Top 10 Most Visited Posts';
      } else {
        $posts = Blog::orderBy('created_at', 'desc')->paginate(10);
        $organization = 'Top 10 Most Recent Posts';
      }
      
      $data = array(
        'posts' => $posts,
        'organization' => $organization
      );
      
      return view('blog/home', $data);
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
      $blog->comment_count = 0;
      $blog->visit_count = 0;
      
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
      $post = Blog::find($id);
      
      return view('adminPanel.edit', ['post'=>$post]);
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
      
      if (isset($request->commentCount)) {
        $commentCount = $request->commentCount;
        $post->comment_count = $commentCount;
      }
      
      if (isset($request->visitCount)) {
        $visitCount = $request->visitCount;
        $post->visit_count = $visitCount;
      }

      if (isset($request->title)) {
        $postTitle = $request->title;
        $post->title = $postTitle;
      }
      
      if (isset($request->body)) {
        $postBody = $request->body;
        $post->body = $postBody;
      }
      
      $post->save();
      
      if (isset($request->editForm)) {
        return redirect()->route('blogs.index');
      } else {
        return redirect()->route('blogs.show', ['id'=>$id]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Blog::find($id);
      
      $post->delete();
      
      return redirect()->route('blogs.index');
    }
}
