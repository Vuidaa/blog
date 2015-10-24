@extends('layout')

@section('content')
<main class="col-md-12">
	<h1 class="page-title">Site administration</h1>
	<article class="post">
		<div class="entry-content clearfix">
			<form method="POST" action="{{ url('auth/login') }}" class="contact-form">
				{!! csrf_field() !!}
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
		<input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
		<input type="password" name='password' placeholder="Password" required>
						<button class="btn-send btn-5"><span>Login</span></button>
						@if($errors->has())
							    @foreach($errors->all() as $e)
							    	<p>{{$e}}</p>
							    @endforeach
						@endif
					</div>
				</div>	<!-- row -->
			</form>
		</div>
	</article>
</main>
@endsection