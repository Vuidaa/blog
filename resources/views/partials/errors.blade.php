@if($errors->has())
	<div class="alert alert-danger">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    <strong>There was an error with your submission.</strong><br><br>
	    @foreach($errors->all() as $e)
	    	<p>{{$e}}</p>
	    @endforeach
	</div>
@endif