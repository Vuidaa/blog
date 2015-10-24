@extends('admin.layout')
@section('content')
@include('partials.back')
<h1>{{$post->title}}</h1>
<small>Posted at - {{$post->created_at}}</small>
<hr>
{!! $post->body!!}
@endsection