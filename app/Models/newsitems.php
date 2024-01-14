<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class newsitems extends Model
{
  use HasFactory;
  
  // protected $fillable = ['title', 'content', 'tags', 'email', 'image', 'author', 'websiteName', 'website'];

  public function scopeFilter($query, array $filters){
    if($filters['tag'] ?? false){
      $query->where('tags', 'like', '%' . request('tag') . '%');
    }
    if($filters['search'] ?? false){
      $query->where('title', 'like', '%' . request('search') . '%')
      ->orWhere('content', 'like', '%' . request('search') . '%')
      ->orWhere('tags', 'like', '%' . request('search') . '%')
      ->orWhere('author', 'like', '%' . request('search') . '%')
      ->orWhere('websiteName', 'like', '%' . request('search') . '%');
    }
  }

  // Relationship to user
  public function user(){
    return $this->belongsTo(User::class);
    // for this example , 'user_id' is not nessasary, because laravel will look for user_id automaticly
  } 
}
