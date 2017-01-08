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
          <td><a class="btn btn-info" href="{{ route('blogs.edit', ['id'=>$post->id]) }}">Edit</a></td>
          <td>
            <form action="{{ route('blogs.destroy', ['id'=>$post->id]) }}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="DELETE">

              <input type="submit" value='Delete' class="btn btn-danger">
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection