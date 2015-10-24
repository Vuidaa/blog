@extends('admin.layout')

@section('content')
	<div class='col-md-8 col-sm-8'>
		@include('partials.back')
		<div class='well'>
	  		<form action="{{ url('admin/category/'.$category->slug) }}" method="POST" role="form">
	  		 	<div class="form-group">
					<legend>Edit category</legend>
				</div>
	    		{!! csrf_field() !!}
	    		{!! method_field('PUT') !!}
	    		<div class="form-group">
	    			<label for='category'>Category</label>
	    			<input type='text' name='category' id='category' class='form-control' value="{{ $category->category }}">
	    		</div>
	    		<div class="form-group">
	    			<input type='submit' value='Edit' class='btn btn-primary btn-sm' >
	    		</div>
	    	</form>
	    	@include('partials.errors')
    	</div>
	</div>
@endsection
