@extends('layout')
@section('content')
<h1>{{$heading}}</h1>
<section class=home-b1>
  <div class='row'>
    <div class='col'>
      <h1>{{$heading}}</h1>
      <x-flash-message/> 
      <form method="post" action="/users/authenticate">
        @csrf
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" value="{{old('email')}}"><br>
          @error('email')<p>{{$message}}</p>@enderror
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" value="{{old('password')}}"><br>
          @error('password')<p>{{$message}}</p>@enderror
        <button type="submit" value="Submit">Submit</button>
      </form>
    </div>
  </div>
  <div class='row'>
    <div class='col'>
      <h2>Don't have an account?</h2>
      <a href="/sugnup">signup</a>
    </div>
  </div>
</section>
@endsection