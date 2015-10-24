@extends('admin.layout')
@section('content')
<h1>Tags</h1>
@if(!$tags->isEmpty())
<table class='table table-bordered' id='data-table'>
    <thead>
        <tr>
           <th>Tag</th><th>Posts</th><th>Date created</th><th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tags as $tag)
        <tr>
            <td>{{$tag->tag}}</td>
            <td><a href="{{ url('admin/tag/'.$tag->slug) }}">{{$tag->posts->count()}}</a></td>
            <td>{{Carbon\Carbon::createFromTimeStamp(strtotime($tag->created_at))}} <br>
            <small>({{ Carbon\Carbon::createFromTimeStamp(strtotime($tag->created_at))->diffForHumans()}})</small>
            </td>
            <td>   
                <form action="{{ url('admin/tag/'.$tag->slug) }}" method="POST" role="form">
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
    <strong>No tags found!</strong>
</div>
@endif
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
    $('#data-table').DataTable({ "order" : [[ 1, "desc"]], "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]] });
});
</script>
@endsection