<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];
    protected $table = 'category';

    // Karena memiliki lebih dari 1 berita
    public function post()
    {
        return $this->hasMany('App\Post');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
