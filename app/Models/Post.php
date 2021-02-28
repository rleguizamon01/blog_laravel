<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(Post::class);
    }

    public function category(){
        return $this->hasOne(Category::class);
    }
}
