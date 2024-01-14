@extends('layout')
@section('content')
<section class=home-b1>
  <div class='row'>
    <div class='col'>
      <h1>{{$heading}}</h1>
      <x-flash-message/> 
      <form method="post" action="/users">
        @csrf
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" value="{{old('name')}}"><br>
          @error('name')<p>{{$message}}</p>@enderror
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" value="{{old('email')}}"><br>
          @error('email')<p>{{$message}}</p>@enderror
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" value="{{old('password')}}"><br>
          @error('password')<p>{{$message}}</p>@enderror
        <label for="password_confirmation">Password confirmation</label><br>
        <input type="password" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}"><br>
          @error('password_confirmation')<p>{{$message}}</p>@enderror
        <button type="submit" value="Submit">Submit</button>
      </form>
    </div>
  </div>
  <div class='row'>
    <div class='col'>
      <h2>Already have an account?</h2>
      <a href="/login">Log in</a>
    </div>
</section>
@endsection