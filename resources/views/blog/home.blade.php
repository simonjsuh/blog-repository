<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  {{--jquery cdn--}}
  <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
  
  {{--bootstrap cdn--}}
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <style type="text/css">
    .headingBox {
      position: relative;
    }
    .loginBox {
      position: absolute;
      top: 0;
      right: 0;
      margin-top: 10px;
    }
    .loginBox a {
      color: #0d3625;
    }
  </style>
  
  <title>Document</title>
</head>
<body>
<div class="container">
  <div class="row headingBox">
    <div>
      <h1>Welcome to the Blog</h1>
    </div>

    <div class="loginBox nav navbar-nav">
      <!-- Authentication Links -->
      @if (Auth::guest())
        <li><a class="btn" href="{{ url('/login') }}">Login</a></li>
        <li><a href="{{ url('/register') }}">Register</a></li>
      @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="{{ url('/logout') }}"
                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Logout
              </a>

              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
      @endif 
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
    
    <div class="well well-lg">
      <h3>Blog Post Title</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores atque, deleniti et laboriosam maxime non
        praesentium repellat sint soluta temporibus. Deserunt dicta in nemo nesciunt. Blanditiis ducimus harum magni
        placeat.</p>
    </div>

    <div class="well well-lg">
      <h3>Blog Post Title</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores atque, deleniti et laboriosam maxime non
        praesentium repellat sint soluta temporibus. Deserunt dicta in nemo nesciunt. Blanditiis ducimus harum magni
        placeat.</p>
    </div>

    <div class="well well-lg">
      <h3>Blog Post Title</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores atque, deleniti et laboriosam maxime non
        praesentium repellat sint soluta temporibus. Deserunt dicta in nemo nesciunt. Blanditiis ducimus harum magni
        placeat.</p>
    </div>

    <div class="well well-lg">
      <h3>Blog Post Title</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores atque, deleniti et laboriosam maxime non
        praesentium repellat sint soluta temporibus. Deserunt dicta in nemo nesciunt. Blanditiis ducimus harum magni
        placeat.</p>
    </div>

    <div class="well well-lg">
      <h3>Blog Post Title</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores atque, deleniti et laboriosam maxime non
        praesentium repellat sint soluta temporibus. Deserunt dicta in nemo nesciunt. Blanditiis ducimus harum magni
        placeat.</p>
    </div>

    <div class="well well-lg">
      <h3>Blog Post Title</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores atque, deleniti et laboriosam maxime non
        praesentium repellat sint soluta temporibus. Deserunt dicta in nemo nesciunt. Blanditiis ducimus harum magni
        placeat.</p>
    </div>

    <div class="well well-lg">
      <h3>Blog Post Title</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores atque, deleniti et laboriosam maxime non
        praesentium repellat sint soluta temporibus. Deserunt dicta in nemo nesciunt. Blanditiis ducimus harum magni
        placeat.</p>
    </div>

    <div class="well well-lg">
      <h3>Blog Post Title</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores atque, deleniti et laboriosam maxime non
        praesentium repellat sint soluta temporibus. Deserunt dicta in nemo nesciunt. Blanditiis ducimus harum magni
        placeat.</p>
    </div>

    <div class="well well-lg">
      <h3>Blog Post Title</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores atque, deleniti et laboriosam maxime non
        praesentium repellat sint soluta temporibus. Deserunt dicta in nemo nesciunt. Blanditiis ducimus harum magni
        placeat.</p>
    </div>

    <div class="well well-lg">
      <h3>Blog Post Title</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores atque, deleniti et laboriosam maxime non
        praesentium repellat sint soluta temporibus. Deserunt dicta in nemo nesciunt. Blanditiis ducimus harum magni
        placeat.</p>
    </div>
  </div>
  
</div>
</body>
</html>