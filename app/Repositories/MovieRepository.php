<?php

namespace App\Repositories;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieRepository
{
    public function search(Request $request)
    {
        $movies = Movie::query();

        if ($request->filled('category_id')) {
            $movies->whereHas('categories', function ($query) use ($request) {
                $query->where('category_movie.category_id', $request->query->get('category_id'));
            });
        }
        if ($request->filled('title')) {
            $movies->where('title', 'like', '%' . $request->query->get('title') . '%');
        }
        if ($request->filled("popular")) {
            $movies->orderBy('popularity', $request->get("popular"));
        }
        if ($request->filled("rate")) {
            $movies->orderBy('vote_average', $request->get("rate"));
        }

        return $movies;
    }
}
