<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class libraryController extends Controller
{
  // emo bunny creation
  private $ears = "()_()";
  private $face;
  private $emotion;
  private $feet = '("")("")';
  private $emotion_counts = [];
  private $total= 0;
  function emotions() {
    return array(
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
}

function random_face(&$emotionCounts, &$total) {
    $ears = "()_()";
    $feet = '("")("")';
    $emotionList = emotions();
    $key = array_rand($emotionList);
    $face = $emotionList[$key][0];

    emotion_count($emotionCounts, $key, $total);

    return array(
        'ears' => $ears,
        'face' => $face,
        'feet' => $feet
    );
}

function emotion_count(&$emotionCounts, $emotion, &$total) {
    if (!isset($emotionCounts[$emotion])) {
        $emotionCounts[$emotion] = 0;
    }
    $emotionCounts[$emotion]++;
    $total++;
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
    public function library() {
      return view('library', [
        'pagetitle' => 'Library',
        'heading' => 'Library'
        'bunnies' => $bunnies,
        'emotionCounts' => $emotionCounts,
        'total' => $total,
      ]);
    }
  }