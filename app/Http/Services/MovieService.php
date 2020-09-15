<?php

namespace App\Http\Services;

use App\Models\Movie;
use Tmdb\Repository\MovieRepository;

class MovieService
{
    protected $movies;
    protected $num_of_records;

    public function __construct(MovieRepository $movies) {
        $this->movies = $movies;
        $this->num_of_records = config('seeder.num_of_records');
    }

    public function fillMovieFromTMDB($TmbMovie)
    {
        $movie = new Movie();

        $movie->movie_id = $TmbMovie["id"];
        $movie->title = $TmbMovie["title"];
        $movie->popularity = $TmbMovie["popularity"];
        $movie->vote_count = $TmbMovie["vote_count"];
        $movie->vote_average = $TmbMovie["vote_average"];
        $movie->release_date = $TmbMovie["release_date"] != "" ? $TmbMovie["release_date"] : null;
        $movie->save();

        return $movie;
    }

    public function seedTopRatedMovies()
    {
        $pages = ceil($this->num_of_records / 20);
        for ($page = 1; $page <= $pages; $page++)
        {
            $topRatedMovies = $this->movies->getApi()->getTopRated(['page' => $page]);

            foreach ($topRatedMovies["results"] as $topRatedMovie) {
                $movie = Movie::query()->where('movie_id', '=', $topRatedMovie["id"])->first();
                if (!$movie) {
                    $movie = $this->fillMovieFromTMDB($topRatedMovie);
                    $movie->categories()->sync($topRatedMovie["genre_ids"]);
                }
            }
        }
    }

    public function seedLatestMovie()
    {
        $latestMovie = $this->movies->getApi()->getLatest();

        $movie = Movie::query()->where('movie_id', '=', $latestMovie["id"])->first();
        if (!$movie) {
            $movie = $this->fillMovieFromTMDB($latestMovie);
            $genres = array_column($latestMovie["genres"], 'id');
            $movie->categories()->sync($genres);
        }
    }
}
