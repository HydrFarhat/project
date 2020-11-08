@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
      <h1 class="mt-4">{{$posts->title}}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{$posts->finduser($posts)->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
      <p>Posted on {{$posts->created_at}}</p>

        <hr>

        <!-- Preview Image -->
      <img class="img-fluid rounded" src="/images/{{$posts->image}}" alt="">

        <hr>

        <!-- Post Content -->
      <p class="lead">{{$posts->body}}</p>

        
        <blockquote class="blockquote">
          <footer class="blockquote-footer">Someone famous in
            <cite title="Source Title">Source Title</cite>
          </footer>
        </blockquote>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form method="POST" action="/home/posts/{{$posts->id}}">
            @csrf
              <div class="form-group">
                <textarea class="form-control" rows="3" name="comment"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        @foreach($posts->getcomments($posts) as $comment)
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{$comment->finduser($comment->user_id)->name}}</h5>
            <div>
            <p>{{$comment->comment}}</p>
            @if(auth()->user()->id==$comment->user_id)
            <form method="POST" action="/home/posts/{{$posts->id}}"> @csrf @method('DELETE')<button name="comme_id" value="{{$comment->id}}"type="submit" class="btn btn-danger">Delete</button></form>
            @endif
            </div>
          </div>
        </div>
        @endforeach

        <!-- Comment with nested comments -->
        
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
@endsection