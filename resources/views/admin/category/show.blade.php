@extends('admin.layout')
@section('content')
@include('partials.back')
<h1>{{$category->category}}</h1>
@if(!$category->posts->isEmpty())
<table class='table table-bordered' id='data-table'>
		<thead>
			<tr>
			 <th>Title</th><th>Comments</th><th>Tags</th>
			</tr>
		</thead>
		<tbody>
			@foreach($category->posts as $post)
    			<tr>
                    <td><a href="{{ url('admin/post/'.$post->slug) }}">{{ $post->title }}</a></td>
                    <td>{{$post->comments->count()}}</td>
                    <td>
	                    @if($post->tags->isEmpty())
				          No tags found.
				        @else
				          @foreach($post->tags as $tag)
				          	<a href="{{ url('admin/tag/'.$tag->slug) }}">{{$tag->tag}}</a>,
				          @endforeach
				        @endif
    				</td>
    			</tr>
			@endforeach
		</tbody>
	</table>
@else
	<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>No posts by selected category found!</strong>
  </div>
@endif
@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
	$('#data-table').DataTable({ "order" : [[ 0, "desc"]], "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]]});
});
</script>
@endsection