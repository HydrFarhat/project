@extends('layouts.app')
@section('content')

<h2>Update Post</h2>

<form method="POST" action="/home/posts/{{$posts->id}}" >
@csrf
@method('PUT')
    <div class="form-group" >
      <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='title' value="{{$posts->title}}">
    </div>
  

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Body</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='body'>{{$posts->body}}</textarea>
      </div>

      <div class="form-group">
        <label for="exampleFormControlFile1">Select Image</label>
      <input type="file" class="form-control-file" id="exampleFormControlFile1" name='image' value="{{$posts->image}}">
      </div>


    <button type="submit" class="btn btn-primary">Update</button>
  </form>
    
@endsection
