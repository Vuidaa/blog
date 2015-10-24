@extends('layout')

@section('content')
<main class="col-md-8">
	@if(!$posts->isEmpty())
		@foreach($posts as $post)
			<article class="post">
			  <header class="entry-header">
			    <h1 class="entry-title">
			      <a href="{{ url('post/'.$post->slug) }}">{{$post->title}}</a>
			    </h1>
			    <div class="entry-meta">
			      <span class="post-category"><a href="#">{{$post->category->category}}</a></span>

			      <span class="post-date"><a href="#">
			      <time class="entry-date" datetime="2012-11-09T23:15:57+00:00">{{$post->dateFormator()}}</time></a>
			  	  </span>

			      <span class="post-author"><a href="#">{{$post->user->name}}</a></span>

			      <span class="comments-link"><a href="#"><b>{{$post->comments->count()}}</b> Comments</a></span>
			    </div>
			  </header>
			  <div class="entry-content clearfix">
			   	<p>{!! str_limit($post->body, 500) !!}</p>
			    <div class="read-more cl-effect-14">
			      <a href="{{ url('post/'.$post->slug) }}" class="more-link">Continue reading <span class="meta-nav">→</span></a>
			    </div>
			  </div>
			</article>
		@endforeach
		<br>
		@include('partials.pagination', ['paginator' => $posts])
	@else
	<article class="post">
	  <header class="entry-header">
	    <h1 class="entry-title">
	      No posts found !
	      <div class="entry-meta">
	      <span><a href="{{ url('admin/post/create')}}">>Add your first post<<</a></span>
	    </div>
	    </h1>
	  </header>
	</article>
	@endif
</main>
@include('partials.aside')
@endsection