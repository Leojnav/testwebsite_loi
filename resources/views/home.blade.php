<?php  
$pagetitle = "Hello World!";
$fullname = <<<_END
  Joël van Sandijk
_END;
$age = <<<_END
  20 
_END;
$pets = <<<_END
  2 Cats of almost 1 year old and a dog whose age I don't know. 
_END;
$hobby = <<<_END
  playing games, watching movies and series, listening to music and programming.
_END;
$country = <<<_END
  The Netherlands
_END;
?>
<!-- Navbar & Database + other includes -->
<?php
	// require_once 'includes/header.php';
?>
<section class=home-b1>
  <h1>
    {{$pagetitle}}
  </h1>
  <h3>{{"My name is ".$fullname."."}}</h3>
  <p>{{"Today i will tell you a little about my self. I am ".$age." years old. And i live in the ".$country.". At home i have ".$pets." And my hobby's are ".$hobby}}</p>
  <div class='row'>
    @for ($tafel = 8; $tafel <= 12; $tafel++)
      <div class='col1-5'>
        @for ($keersom = 1; $keersom <= 10; $keersom++)
          <p>{{ $keersom }} x {{ $tafel }} = {{ $keersom * $tafel }}</p>
        @endfor
      </div>
    @endfor
  </div>
</section>
<section class=home-b1>
  <div class='col'>
<?php
    // $test = tree();
    // echo '<img src="' . $test . '" alt="Boom van Pythagoras">';

    // echo '<img src="' . tree() . '" alt="Tree Image" />';
    ?>
  </div>
</section>
<section class=home-b1>
  <div class='col'>
    <?php
    //   $query  = "SELECT *";
    //   $result = $pdo->query($query);
    ?>
  </div>
</section>
<section class=home-b1>
  <div class='col'>
    <h1>{{$heading}}</h1>
    @unless(count($news) == 0)
      @foreach ($news as $news)
        <p>{{$news['id']}}</p>
        <h3><a href="/news/{{$news['id']}}">{{$news['title']}}</a></h3>
        <p>{{$news['content']}}</p>
      @endforeach
      @else
        <p>No news</p>    
    @endunless
  </div>
</section>

<!-- Footer -->
<?php
  //require_once 'php/footer.php';
?>