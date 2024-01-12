<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
  <link rel="manifest" href="images/site.webmanifest">
  <link rel="mask-icon" href="images/safari-pinned-tab.svg" color="#b55bd5">
  <meta name="msapplication-TileColor" content="#9f00a7">
  <meta name="theme-color" content="#fff">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='//unpkg.com/alpinejs' defer></script>
  @vite(['resources/scss/custom.scss','resources/js/custom.js'])
  <title>{{$pagetitle}}</title>
</head>
<body>
<nav class="nav">
  <p class="count">
    {{-- {{pageCounter();}} --}}
  </p>
  <div class="navbar-left">
    <a href="/"><img src="/images/Leo.png" alt="Logo"></a>
  </div>
  <div class=navbar-right>
    @auth
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/bmi-calculator">BMI Calculator</a></li>
      <li><a href="/lab">Experimentation lab</a></li>
      <li><a href="/bunny">Bunny army</a></li>
      <li><a href="/upload">Upload</a></li>
      <li><a href="/news/manage">Manage news</a></li>
      <li><form method="post" action="/logout">
        @csrf
        <button class="logout-btn" type="submit">Log out</button>
      </form></li>
    </ul>
    @else 
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/bmi-calculator">BMI Calculator</a></li>
      <li><a href="/bunny">Bunny army</a></li>
      <li><a href="/signup">Sign up</a></li>
      <li><a href="/login">Log in</a></li>
    </ul>
    @endauth
  </div>
</nav>
{{-- View output --}}
<main>
  @yield('content')
</main>
{{-- Footer --}}
<footer>
  <li><a href="/news/create">Create article</a></li>
</footer>
</body>
</html>