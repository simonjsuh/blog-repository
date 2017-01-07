@extends('layouts.homePublicTemplate')

@section('title', 'View Post #' . $id)

@section('content')
  <div id="fbCommentCount" style="display: none;">
    <span class="fb-comments-count" data-href="{{ Request::url() }}"></span>
  </div>
  
  <form style="display: none;" name="fbCommentCountform" id="fbCommentCountForm" action="{{ route('blogs.update', ['id'=>$id]) }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    
    <input type="text" name="commentCount" id="fbFormCommentCount">
  </form>
  
  <div class="row">
    <a href="http://tutvids.com/laravel/blog/public">Go to Home</a>
  </div>
  <div id="postContent" class="row">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
  </div>
  
  <div class="row text-center" id="facebookCommentContainer">
    <div class="fb-comments" data-href="{{ Request::url() }}" data-width="800" data-numposts="10"></div>
  </div>
  
  <script>
    let fbCommentCount = document.getElementById('fbCommentCount').getElementsByClassName('fb_comments_count');

    setTimeout(function() {
      document.getElementById('fbFormCommentCount').value = fbCommentCount[0].innerHTML;
      
      var $formVar = $('form');
      
      $.ajax({
        url: $formVar.prop('{{ route('blogs.update', ['id'=>$id]) }}'),
        method: 'PUT',
        data: $formVar.serialize(),
      });
      }, 1000);

    {{--$('form').on('submit', function(e){--}}
      {{--e.preventDefault();--}}
      {{--var $this = $(this);--}}

      {{--$.ajax({--}}
        {{--url: $this.prop('{{ route('blogs.update', ['id'=>$id]) }}'),--}}
        {{--method: 'PUT',--}}
        {{--data: $this.serialize(),--}}
      {{--}).done(function(response){--}}
        {{--alert('success');--}}
      {{--}).error(function(err){--}}
        {{--alert('error');--}}
      {{--});--}}
    {{--});--}}
    
//    function submitForm() {
//      $('form').on('submit', function(e){
//        e.preventDefault();
//        var $this = $(this);
//
//        $.ajax({
//          url: $this.prop('action'),
//          method: 'PUT',
//          data: $this.serialize(),
//        }).done(function(response){
//          alert('success');
//        }).error(function(err){
//          alert('error');
//        });
//      });
//    }

    {{--function submitForm() {--}}
      {{--var http = new XMLHttpRequest();--}}
      {{--http.open("PUT", "{{ route('blogs.update', ['id'=>$id]) }}", true);--}}
      {{--http.setRequestHeader("Content-type","application/x-www-form-urlencoded");--}}
      {{--var method = document.getElementsByName('_method')[0].value;--}}
      {{--var token = document.getElementsByName('_token')[0].value;--}}
      {{--var commentCount = document.getElementById('fbFormCommentCount').value;--}}
      {{--var params = "commentCount=" + commentCount;--}}
      {{--http.send(params);--}}
      {{--http.onload = function() {--}}
        {{--alert(http.responseText);--}}
      {{--}--}}
    {{--}--}}

    {{--function submitForm() {--}}
      {{--$.ajax({--}}
        {{--url: '{{ route('blogs.update', ['id'=>$id]) }}',--}}
        {{--success: function () {--}}
          {{--alert("worked");--}}
        {{--}--}}
      {{--});--}}
    {{--}--}}
  </script>
@endsection