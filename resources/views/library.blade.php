@extends('layout')
@section('content')
<section class=library-b1>
  <div class='row'>
    <div class='col'>
    <form method='post' action='' enctype='multipart/form-data'>
    <h3>Select a JPG, GIF, PNG or TIF File:</h3>
    <input type='file' name='filename' size='10'>
    <input class="uk-button" type='submit' value='Upload'>
    </form>
    <?php
      if ($_FILES)
      {
        $name = $_FILES['filename']['name'];
        $name = strtolower(preg_replace("[^A-Za-z0-9.]", "", $name));
        switch($_FILES['filename']['type'])
        {
          case 'image/jpeg': $ext = 'jpg'; break;
          case 'image/svg':  $ext = 'svg'; break;
          case 'image/png':  $ext = 'png'; break;
          case 'image/webp': $ext = 'webp'; break;
          case 'image/jpeg':  $ext = 'jpg'; break;
          default:           $ext = '';    break;
        }
        if ($ext)
        {
          $target_directory = "images/";
          $n = $target_directory . basename($_FILES['filename']['name']);
          move_uploaded_file($_FILES['filename']['tmp_name'], $n);
          echo "Uploaded image '$name' as '$n':<br>";
        }
        else echo "'$name' is not an accepted image file";
      }
      else echo "No image has been uploaded";
    ?>
  </div>
</section>
<section class=library-b1>
  <div class='row'>
    <div class='col'>
    <h3>Images in the library:</h3>
    <?php
    // emo bunny creation
    $ears = "()_()";
    $face;
    $emotion;
    $feet = '("")("")';
    $emotion_counts = [];
    $total= 0;
    function emotions() {
      $emotion = array(
        'Angry' => array("(!.!)"),
        'Happy' => array("(^.^)"),
        'Sad' => array("(~.~)"),
        'Confused' => array("(?.?)"),
        'Shy' => array("(>.<)"),
        'Scared' => array("(o.o)"),
        'Tired' => array("(-.-)"),
        'Shocked' => array("(@.@)"),
        'Greed' => array("($.$)"),
      );
      return $emotion;
    }
    function random_face() {
      $emotion = $this->emotions();
      $key = array_rand($emotion);
      $this->emotion = $key;
      $this->emotion_count();
      $this->face = $emotion[$key][0];

      return array($this->face);
    }
    function emotion_count() {
      if (!isset($this->emotion_counts[$this->emotion])) {
        $this->emotion_counts[$this->emotion] = 0;
      }
      $this->emotion_counts[$this->emotion]++;
    }
    function Emobunny() {
      $total = 0;
      foreach (array_keys($this->emotions()) as $emotion) {
        $this->emotion_counts[$emotion] = 0;
      }
      echo "<div class='row'>";
      for ($row=0; $row < 15; $row++) {
        echo '<div class="col1-15">';
        for ($i=0; $i < 2; $i++) {
          $this->random_face();
          echo "<p>".$this->ears."</p>";
          echo "<p>".$this->face."</p>";
          echo "<p>".$this->feet."</p><br><br>";
        }
        echo '</div>';
      }
      echo "</div>";
      echo "<div class='row40'><div class='col'><h3>Emotion count:</h3></div>";
      foreach ($this->emotion_counts as $emotion => $count) {
        echo "<div class='col1-5'><p>$emotion: $count</p></div>";
        $total = $total + $count;
      }
      echo "<div class='col'><p><br>total amount of bunny's: ".$total."</p></div></div>";
      $fh = fopen("bunny-bunker/bunny.txt", 'a') or die("Failed to create file");
      $number = 1;
      $text = "Iteration #$number\n\n";
      $number++;
      fwrite($fh, $text) or die("Could not write to file");
      fclose($fh);
      foreach ($this->emotion_counts as $emotion => $count) {
        $fh = fopen("bunny-bunker/bunny.txt", 'a') or die("Failed to create file");
        $text = "$emotion: $count\n";
        fwrite($fh, $text) or die("Could not write to file");
        fclose($fh);
      }
      $fh = fopen("bunny-bunker/bunny.txt", 'a') or die("Failed to create file");
      $text = "\nTotal amount of bunny's: $total\n\n";
      fwrite($fh, $text) or die("Could not write to file");
      fclose($fh);
      echo "File 'bunny.txt' written successfully";
      }
      echo Emobunny();
    ?>
  </div>
</section>
@endsection