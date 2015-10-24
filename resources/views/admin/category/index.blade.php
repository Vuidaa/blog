@extends('admin.layout')
@section('content')
<a class='btn btn-success btn-sm' href="{{ url('admin/category/create') }}">
<span class="glyphicon glyphicon-plus"></span> Add new</a>
<h1>Categories</h1>
@if(!$categories->isEmpty())
<table class='table table-bordered' id='data-table'>
    <thead>
        <tr>
            <th>Category</th><th>Posts</th><th>Date created</th><th>Edit</th><th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td><a href="{{ url('admin/category/'.$category->slug) }}">{{ $category->category }}</a></td>
            <td>{{$category->posts->count()}}</td>
            <td>{{Carbon\Carbon::createFromTimeStamp(strtotime($category->created_at))}} <br>
            <small>({{ Carbon\Carbon::createFromTimeStamp(strtotime($category->created_at))->diffForHumans()}})</small></td>
            <td><a href="{{ url('admin/category/'.$category->slug.'/edit') }}" class='btn btn-info btn-sm'>
            <span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
            <td>
                <form action="{{ url('admin/category/'.$category->slug) }}" method="POST" role="form">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
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
    <strong>No categories found!</strong>
</div>
@endif
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
    $('#data-table').DataTable({ "order" : [[ 0, "asc"]] , "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]]});
});
</script>
@endsection