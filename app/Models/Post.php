<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'body', 'image', 'category_id'];

    public function user(){
        return $this->belongsTo(Post::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
