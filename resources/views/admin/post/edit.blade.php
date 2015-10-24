@extends('admin.layout')

@section('content')
	<div class='col-md-12 col-sm-12'>
	@include('partials.back')
		<div class='well'>
			@include('partials.errors')
	  		<form action="{{ url('admin/post/'.$post->slug) }}" method="POST" role="form">
	  		 	<div class="form-group">
					<legend>Edit post</legend>
				</div>
	    		{!! csrf_field() !!}
	    		{!! method_field('PUT') !!}
	    		<div class="form-group">
	    			<label for='category'>Category</label>
	    			<select name='category' class='form-control'>
	    				@foreach($categories as $id => $category)
	    					@if($post->category->id == $id)
	    						<option selected='selected' value="{{ $id }}">{{ $category}}</option>
	    					@else
	    						<option value="{{ $id }}">{{ $category}}</option>
	    					@endif
	    				@endforeach
	    			</select>
	    		</div>
	    		<div class="form-group">
	    			<label for='title'>Title</label>
	    			<input name='title' type='text' value="{{ $post->title }}" class='form-control'>
	    		</div>
	    		<div class="form-group">
	    			<label for='tags'>Tags</label>
	    			<input name='tags' type="text" id='tags'
	    			data-role="tagsinput"  id='tags'> 
	    		</div>
	    		<div class="form-group">
	    			<label for='post'>Post</label>
	    			<textarea name="post" id="post" rows="10" cols="200">{{ $post->body }}</textarea>
	    		</div>
	    		<div class="form-group">
	    			<input type='submit' value='Update' class='btn btn-default form-control'>
	    		</div>	    		
	    	</form>
    	</div>
	</div>
@endsection

@section('scripts')
@include('admin.partials.editor')
<!-- place in header of your html document -->
<script type="text/javascript">
$(document).ready(function(){
	@if(!$post->tags->isEmpty())
	    @foreach($post->tags as $tag)
	    	$('#tags').tagsinput('add', "{{$tag->tag}}");
	    @endforeach
	@endif
});
</script>
@endsection