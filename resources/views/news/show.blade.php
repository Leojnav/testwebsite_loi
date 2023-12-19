@extends('layout')
@section('content')
{{$pagetitle}}
<p>{{$news->id}}</p>
<p>{{$news->image}}</p>
<h3>{{$news->title}}</h3>
<p>{{$news->created_at->format('d-m-Y')}}</p>
<x-news-tags :tags="$news->tags"/>
<p>{{$news->content}}</p>
<p><a href="{{$news->website}}" target="_blank">{{$news->websiteName}}</a></p>
<p>{{$news->author}}</p>
<p><a href="/">Back</a></p>
@endsection