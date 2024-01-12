@extends('layout')
@section('content')
  <section class=home-b1>
    <div class='row'>
        <div class='col'>
          <h1>{{$heading}}</h1>
          <x-flash-message/> 
          <form class="createform" method="post" action="/news/{{$news->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title" value="{{$news->title}}"><br>
              @error('title')<p>{{$message}}</p>@enderror
            <label for="content">Content</label><br>
            <textarea name="content" id="content" cols="30" rows="10" >{{$news->content}}</textarea><br>
              @error('content')<p>{{$message}}</p>@enderror
            <label for="image">Image</label><br>
            <input type="file" name="image" id="image"><br>
            <img src="{{$news->image ? asset('storage/' . $news->image) : asset('/images/no-image.png')}}" alt=""/><br>
              @error('image')<p>{{$message}}</p>@enderror
            <label for="tags">Tags</label><br>
            <input type="text" name="tags" id="tags" value="{{$news->tags}}"><br>
              @error('tags')<p>{{$message}}</p>@enderror
            <label for="websiteName">Website name</label><br>
            <input type="text" name="websiteName" id="websiteName" value="{{$news->websiteName}}"><br>
              @error('websiteName')<p>{{$message}}</p>@enderror
            <label for="website">Website link</label><br>
            <input type="url" name="website" id="website" value="{{$news->website}}"><br>
              @error('website')<p>{{$message}}</p>@enderror
            <label for="author">Author</label><br>
            <input type="text" name="author" id="author" value="{{$news->author}}"><br>
              @error('author')<p>{{$message}}</p>@enderror
            <label for="email">Contact Email</label><br>
            <input type="text" name="email" id="email" value="{{$news->email}}"><br>
              @error('email')<p>{{$message}}</p>@enderror
            <input type="submit" value="Submit">
        </div>
    </div>
  </section>
@endsection