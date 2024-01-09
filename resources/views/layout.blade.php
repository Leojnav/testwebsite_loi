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
  @vite(['resources/scss/custom.scss','resources/js/custom.js'])
  <title>{{$pagetitle}}</title>
</head>
<body>
<nav>
  <p class="count">
    {{-- {{pageCounter();}} --}}
  </p>
  <div class="navbar-left">
    <img src="/images/Leo.png" alt="Logo">
  </div>
  <div class=navbar-right>
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/bmi-calculator">BMI Calculator</a></li>
      <li><a href="/lab">Experimentation lab</a></li>
      <li><a href="/bunny">Bunny army</a></li>
      <li><a href="/upload">Upload</a></li>
    </ul>
  </div>
</nav>
{{-- View output --}}
<main>
  @yield('content')
</main>
{{-- Footer --}}
<footer>
 <a href="/news/create">Post newsitem</a>
</footer>
</body>
</html>