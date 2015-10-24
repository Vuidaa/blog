@extends('layout')

@section('content')
<main class="col-md-12">
	<article class="post post-1">
		<header class="entry-header">
			<h1 class="entry-title">{{$post->title}}</h1>
			<div class="entry-meta">
			<span class="post-category"><a href="#">{{$post->category->category}}</a></span>

			<span class="post-date"><a href="#"><time class="entry-date" datetime="2012-11-09T23:15:57+00:00">{{$post->dateFormator()}}</time></a></span>

			<span class="post-author"><a href="#">{{$post->user->name}}</a></span>

			<span class="comments-link"><a href="#">{{$post->comments->count()}} Comments</a></span>
			</div>
		</header>
		<div class="entry-content clearfix">
			{!!$post->body!!}
		</div>
		<hr>
	</article>
	
	<article class="post">
		<h2>Comments...</h2>
		@if($post->comments->count() == 0)
			<p>No comments found.</p>
			<hr>
		@else
			@foreach($post->comments as $key => $comment)
				<br>
					<h4 id="{{$totalComments - $key}}"><span>#{{$totalComments - $key}}</span> - {{$comment->name}} - 
					<small>{{$comment->created_at}}</small>
					<a href='#' id="{{$comment->id}}" class="pull-right reply-button">Reply</a></h4>
					@if($comment->reply_id !== 0)
						<div class='well'>
					{{--*/ $reply = $post->comments->where('id', $comment->reply_id)->first() /*--}}
						<small>{{$reply->created_at}}</small>
						<h5>{{$reply->name}} wrote...<h5>
						<small><blockquote> {{$reply->body}}</blockquote></small>
						</div>
					@endif
					<p>{{$comment->body}}</p>
					<hr>
					<br>	
			@endforeach
		@endif
		<h3>Leave a comment</h3>
		@if($errors->has())
		<p>There was an error with your submission</p>
		@foreach($errors->all() as $e)
			<p style="color:red;">{{$e}}</p>
		@endforeach
		@endif
			<form id='comment-form' action="{{ url('create-comment') }}" method="POST" class="contact-form">
				{!! csrf_field() !!}
				<input id='reply' type='hidden' name='reply' value='0'/>
				<input type='hidden' name='post_id' value="{{$post->id}}">
				<div class="row">
					<div class="col-md-12">
						
						<input type="text" name="name" placeholder="Name" required >
						<input type="text" name="email" placeholder="Email" required>
						<textarea id='comment'name="comment" rows="7" placeholder="Comment" required></textarea>
						
						<button class="btn-send btn-5 btn-5b ion-ios-compose-outline"><span>Post</span></button>
						<button id='clear-reply' class="btn-send btn-5" disabled><span>Clear reply</span></button>
					</div>
				</div>	<!-- row -->
			</form>
	</article>
	
	
</main>
@endsection
