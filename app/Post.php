<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'posts';

    public $fillable = ['title', 'short', 'content', 'img', 'thumb', 'views'];
    
    public function scopeMostViews()
    {
        return $this->orderBy('views', 'DESC')->limit(4);
    }
}
