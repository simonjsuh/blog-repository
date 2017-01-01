@extends('layouts.homePublicTemplate')
    
@section('title', 'Blog Home Page')
    
@section('content')
  <div class="row headingBox">
    <div>
      <h1>Welcome to the Blog</h1>
    </div>

    
  </div>


  {{--menu for different post category organization--}}
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sort Posts By <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="">Top 10 Most Recent Posts</a></li>
            <li><a href="">Top 10 Liked Posts</a></li>
            <li><a href="">Top 10 Most Commented Posts</a></li>
            <li><a href="">Top 10 Most Visited Posts</a></li>
          </ul>
        </li>
      </ul>

      @if(Auth::check())
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{ route('blogs.index')  }}">Manage Blog Posts</a></li>
        </ul>
      @endif
    </div>
  </nav>

  {{--container for containing top 10 posts in specified Post categories--}}
  <div>
    <h2>Top 10 Most Recent Blogs</h2>

    @foreach($posts as $post)
      <div class="well well-lg">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->body }}</p>
      </div>
    @endforeach

    <div class="row text-center">
      {{ $posts->links() }}
    </div>
  </div>  
@endsection


