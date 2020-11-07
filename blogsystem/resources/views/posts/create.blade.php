@extends('layouts.app')

@section('content')

<h2>Create a Post</h2>

<form method="POST" action="/home/posts" >
@csrf
    <div class="form-group" >
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='title'>
    </div>
  

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Body</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='body'></textarea>
      </div>

        <div class="form-group">
          <label for="exampleFormControlFile1">Select Image</label>
          <input type="file" class="form-control-file" id="exampleFormControlFile1" name='image'>
        </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    
@endsection
