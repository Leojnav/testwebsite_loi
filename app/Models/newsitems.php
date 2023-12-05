<?php
namespace App\Models;

class newsitems {
  public static function all () {
    return [
      ['id' => 1, 'title' => 'Post 1', 'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.'],
      ['id' => 2, 'title' => 'Post 2', 'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.'],
      ['id' => 3, 'title' => 'Post 3', 'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.']
    ];
  }
  public static function find($id) {
    $news = self::all();
    foreach ($news as $new) {
      if ($new['id'] == $id) {
        return $new;
      }
    }
  }
}