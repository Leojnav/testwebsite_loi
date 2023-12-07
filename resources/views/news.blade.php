@extends('layout')
@section('content')
{{$pagetitle}}
<p>{{$news['id']}}</p>
<h3>{{$news['title']}}</h3>
<p>{{$news['content']}}</p>
@endsection