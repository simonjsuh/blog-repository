@extends('layouts.template')

@section('title', 'Blog Admin Panel')

@section('content')
  <h1>Admin Panel</h1>
  <a class="btn btn-primary pull-right" href="{{ route('blogs.create') }}">Add New Blog Post</a>
  <br>
  <br>
  <br>
  
  <table class="table">
    <thead>
      <th>id</th>
      <th>title</th>
      <th>body</th>
      <th>edit</th>
      <th>delete</th>
    </thead>
    
    <tbody>
      @foreach($posts as $post)
        <tr>
          <th>{{ $post->id }}</th>
          <td>{{ $post->title }}</td>
          <td>{{ $post->body }}</td>
          <td>Edit</td>
          <td>Delete</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection