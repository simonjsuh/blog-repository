@extends('layouts.homePublicTemplate')
    
@section('title', 'Blog Home Page')
    
@section('content')  
  {{--<div id="fb-root"></div>--}}
  {{--<script>(function(d, s, id) {--}}
      {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
      {{--if (d.getElementById(id)) return;--}}
      {{--js = d.createElement(s); js.id = id;--}}
      {{--js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";--}}
      {{--fjs.parentNode.insertBefore(js, fjs);--}}
    {{--}(document, 'script', 'facebook-jssdk'));</script>--}}
  

  {{--<script>--}}
    {{--window.onload.alert(document.getElementById('fb-comment-count').innerHTML)--}}
    {{----}}
    {{--function changeHTML() {--}}
{{--//      document.getElementById('hello').innerHTML = 'You are now changed';--}}
      {{--document.getElementById('hello').innerHTML = document.getElementById('fb-comment-count').innerHTML;--}}
      {{----}}
    {{--}--}}
{{--//    function sayHi() {--}}
{{--//      setInterval(function() {--}}
{{--//        alert($commentCountMsg);--}}
{{--//      },--}}
{{--//      5000);--}}
{{--//    }--}}
    {{--$commentCountMsg = 'sdfsdf';--}}
{{--//    window.onload = document.getElementById('hello').innerHTML = 'You are now changed';--}}
{{--//    #main-nav .comment-count--}}
  {{--</script>--}}
  
  <div class="row headingBox">
    <div>
      <h1>Welcome to the Blog</h1>
    </div>

    {{--<button onclick="changeHTML()">click me</button>--}}
    {{--<div id="hello">Change Me</div>--}}
  </div>


  {{--menu for different post category organization--}}
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sort Posts By <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="">Top 10 Most Recent Posts</a></li>
            {{--<li><a href="">Top 10 Liked Posts</a></li>--}}
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

   
    
    {{--<div id="disqus_thread"></div>--}}
    {{--<script>--}}

      {{--/**--}}
       {{--*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.--}}
       {{--*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/--}}
      {{--/*--}}
       {{--var disqus_config = function () {--}}
       {{--this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable--}}
       {{--this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable--}}
       {{--};--}}
       {{--*/--}}
      {{--(function() { // DON'T EDIT BELOW THIS LINE--}}
        {{--var d = document, s = d.createElement('script');--}}
        {{--s.src = '//youtube-com.disqus.com/embed.js';--}}
        {{--s.setAttribute('data-timestamp', +new Date());--}}
        {{--(d.head || d.body).appendChild(s);--}}
      {{--})();--}}
    {{--</script>--}}
    {{--<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>--}}


    {{--<a href="/post URL"><div id="fb-comment-count" class="fb-comments-count" data-href="http://tutvids.com/laravel/blog/public/">0</div> awesome comments</a>--}}
    {{----}}
    {{--<div class="fb-comments" data-href="http://tutvids.com/laravel/blog/public/" data-numposts="10"></div>--}}
    
    
  @foreach($posts as $post)
      <div class="well well-lg">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->body }}</p>
        <a class="btn btn-default pull-right" href="{{ route('blogs.show', ['id'=>$post->id]) }}">View Post</a>
        &nbsp;
      </div>
    @endforeach

    <div class="row text-center">
      {{ $posts->links() }}
    </div>
  </div>

  <script id="dsq-count-scr" src="//EXAMPLE.disqus.com/count.js" async></script>
@endsection


