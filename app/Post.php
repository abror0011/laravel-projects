<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'posts';

    public $fillable = ['title', 'short', 'content', 'img', 'thumb', 'views', 'id_cat'];
    
    public function scopeMostViews()
    {
        return $this->orderBy('views', 'DESC')->limit(4);
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'id_cat');
    }
    
}
