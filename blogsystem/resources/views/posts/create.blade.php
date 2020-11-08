@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Create post</h1>
    		
    		<form  method="POST" action="/home/posts">
    		    @csrf
    		    <div class="form-group">
    		        <label for="title">Title </label>
    		        <input type="text" class="form-control" name="title" />
    		    </div>
    		    
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Body</label>
              {{-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='body'></textarea> --}}
              <textarea id="mytextarea" name="body"></textarea>
            </div>
    		    
    		    
              
            <div class="form-group">
              <label for="exampleFormControlFile1">Select Image</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1" name='image'>
            </div>
    		    
    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Create
    		        </button>
    		    </div>
    		    
        </form>
      </div>
  </div>
</div>
<script>
  tinymce.init({
    selector: '#mytextarea'
  });
</script>
@endsection
