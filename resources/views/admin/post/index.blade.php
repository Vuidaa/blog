@extends('admin.layout')
@section('content')
<a class='btn btn-success btn-sm' href="{{ url('admin/post/create') }}">
<span class="glyphicon glyphicon-plus"></span> Add new</a>
<h1>Posts</h1>
@if(!$posts->isEmpty())
<table class='table table-bordered' id='data-table'>
  <thead>
    <tr>
      <th>Title</th>
      <th>Slug</th>
      <th>Category</th>
      <th>Comments</th>
      <th>Tags</th>
      <th>Date created</th>
      <th>View</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <td><a href="{{ url('admin/post/'.$post->slug) }}">{{ str_limit($post->title, 80) }}</a></td>
      <td>{{ str_limit($post->slug, 80) }}</td>
      <td><a href="{{ url('admin/category/'.$post->category->slug) }}">{{ str_limit($post->category->category, 40) }}</a></td>
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
      <td>{{Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))}} <br>
        <small>({{ Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans()}})</small>
      </td>
      <td><a href="{{ url('admin/post/'.$post->slug) }}" class='btn btn-info btn-sm'>
        <span class="glyphicon glyphicon-zoom-in"></span> View</a>
      </td>
      <td><a href="{{ url('admin/post/'.$post->slug).'/edit' }}" class='btn btn-success btn-sm'>
        <span class="glyphicon glyphicon-pencil"></span>Edit</a>
      </td>
      <td>
        <form action="{{ url('admin/post/'.$post->slug) }}" method="POST" role="form">
          {!! csrf_field() !!} {!! method_field('DELETE') !!} 
          <button class='btn btn-danger btn-sm' type='submit'>
          <span class="glyphicon glyphicon-trash"></span> Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>No Posts found!</strong>
</div>
@endif
@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
  $('#data-table').DataTable({ "order" : [[ 5, "desc"]], "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]] });
});
</script>
@endsection