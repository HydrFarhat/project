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

                    <div class="bg-white">
                                    <div class="d-flex flex-row fs-12">

                                        

                                    </div>
                                </div>
                                <div class="bg-light p-2">
                                    <div class="d-flex flex-row align-items-start"><textarea class="form-control ml-1 shadow-none textarea"></textarea></div>
                                    <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                                
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