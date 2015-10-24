@if(Session::has('message'))
	<div class='alert alert-{{Session::get('message.class')}}'>{{Session::get('message.message')}}</div>
@endif