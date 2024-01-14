@extends('layout')
@section('content')
<section class=home-b1>
  <div class='row'>
    <div class='col'>
      <h1>{{$heading}}</h1>
      <x-flash-message/>
      <table>
        <tbody>
          @unless($news->isEmpty())
          @foreach($news as $news)
          <tr>
            <td>{{$news->id}}</td>
            <td>{{$news->title}}</td>
            <td>{{$news->created_at}}</td>
            <td>{{$news->updated_at}}</td> 
            <td><a href="/news/{{ $new->id ?? $news->id }}/edit">Edit</a></td>
            <td><form method="post" action="/news/{{$news->id}}">
              @csrf
              @method('DELETE')
              <button type="submit" value="Delete">Delete</button>
            </form></td>
          </tr>
        </tbody>
        @endforeach
        @else 
          <tr>
            <td>
              <p>No news items found</p>
            </td>
          </tr>
        @endunless
      </table>
    </div>
  </div>
  <div class='row'>
    <div class='col'>
    </div>
  </div>
</section>
@endsection