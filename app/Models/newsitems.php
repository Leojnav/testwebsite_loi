<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
