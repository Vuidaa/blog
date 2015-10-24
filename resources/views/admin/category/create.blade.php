@extends('admin.layout')

@section('content')
	<div class='col-md-8 col-sm-8'>
	@include('partials.back')
		<div class='well'>
	  		<form action="{{ url('admin/category') }}" method="POST" role="form">
	  		 	<div class="form-group">
					<legend>New category</legend>
				</div>
	    		{!! csrf_field() !!}
	    		<div class="form-group">
	    			<label for='category'>Category</label>
	    			<input type='text' name='category' id='category' class='form-control'>
	    		</div>
	    		<div class="form-group">
	    			<input type='submit' value='Add' class='btn btn-primary btn-sm'>
	    		</div>
	    	</form>
	    	@include('partials.errors')
    	</div>
	</div>
	<div class='col-md-4 col-sm-4'>
		<div class='well text-center'>
			<h4>Current categories:</h4>
			@if(!$categories->isEmpty())
				@foreach($categories as $category)
					<b>{{$category->category}}, </b>
				@endforeach
			@endif
		</div>
	</div>
  	
@endsection
