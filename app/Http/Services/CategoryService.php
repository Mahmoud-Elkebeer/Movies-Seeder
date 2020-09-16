<?php

namespace App\Http\Services;

use App\Models\Category;
use Tmdb\Repository\MovieRepository;

class CategoryService
{
    protected $movies;

    public function __construct(MovieRepository $movies) {
        $this->movies = $movies;
    }

    public function fillCategoryFromTMDB($TmbCategory)
    {
        $category = new Category();
        $category->category_id = $TmbCategory["id"];
        $category->name = $TmbCategory["name"];
        $category->save();

        return $category;
    }

    public function seedCategories()
    {
        $genres = $this->movies->getClient()->getGenresApi()->getMovieGenres();
        foreach ($genres["genres"] as $genre) {
            $category = Category::query()->where('category_id', '=', $genre["id"])->first();
            if (!$category) {
                $this->fillCategoryFromTMDB($genre);
            }
        }
    }
}
