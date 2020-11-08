@extends('layouts.app')

@section('content')
<h1 class="display-4">Welcome to Blog</h1>


  <div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-16">
            <div class="d-flex flex-column comment-section">
               
                 
                <div class="row">
                @foreach($posts as $post)
                <a href="/home/posts/{{$post->id}}">
                <div class="zoom">
                    {{-- <a href="/home/posts/{{$post->id}}">{{$post->title}}</a> --}}
                    <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="/images/{{$post->image}}" alt="Card image cap">

                    <div class="card-body">
                    <h5 class="card-title">{{$post->finduser($post)->name}}</h5>
                    <h3 class="card-title">{{$post->title}}</h3>
                    </div>
                    </div>
                </div>
                  </a>

                  @endforeach
</div>
</div>
<br>
<div class="d-flex justify-content-center">
  {!! $posts->links() !!}
            </div>
         
        </div>
    </div>
  </div>


@endsection