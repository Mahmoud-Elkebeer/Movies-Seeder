<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_id', 'name'];

    public function movies()
    {
        return $this->belongsToMany(Category::class, 'category_movie', 'category_id', 'movie_id');
    }
}
