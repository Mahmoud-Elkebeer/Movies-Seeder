<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;

    protected $table = 'movies';
    protected $primaryKey = 'movie_id';
    protected $fillable = ['movie_id', 'title', 'popularity', 'vote_count', 'vote_average', 'release_date'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_movie', 'movie_id', 'category_id');
    }
}
