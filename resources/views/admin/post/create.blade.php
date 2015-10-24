@extends('admin.layout')

@section('content')
	<div class='col-md-12 col-sm-12'>
		@include('partials.back')
		<div class='well'>
			@include('partials.errors')
	  		<form action="{{ url('admin/post') }}" method="POST" role="form">
	  		 	<div class="form-group">
					<legend>New post</legend>
				</div>
	    		{!! csrf_field() !!}
	    		<div class="form-group">
	    			<label for='category'>Category</label>
	    			<select name='category' class='form-control'>
	    				<option selected='selected'></option>
	    				@foreach($categories as $id => $category)
	    					<option value="{{ $id }}">{{ $category}}</option>
	    				@endforeach
	    			</select>
	    		</div>
	    		<div class="form-group">
	    			<label for='title'>Title</label>
	    			<input name='title' type='text' value="{{ old('title') }}" class='form-control'>
	    		</div>
	    		<div class="form-group">
	    			<label for='tags'>Tags</label>
	    			<input name='tags' type="text" value="{{ old('tags') }}" data-role="tagsinput"  id='tags'> 
	    		</div>
	    		<div class="form-group">
	    			<label for='post'>Post</label>
	    			<textarea name="post" id="post" rows="10" cols="200">{{ old('post') }}</textarea>
	    		</div>
	    		<div class="form-group">
	    			<input type='submit' value='Publish' class='btn btn-default form-control'>
	    		</div>	    		
	    	</form>
    	</div>
	</div>
@endsection

@section('scripts')
	@include('admin.partials.editor')
@endsection

