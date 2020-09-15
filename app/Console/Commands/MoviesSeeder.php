<?php

namespace App\Console\Commands;

use App\Http\Services\CategoryService;
use App\Http\Services\MovieService;
use App\Models\Category;
use Illuminate\Console\Command;
use Tmdb\Repository\MovieRepository;

class MoviesSeeder extends Command
{
    protected $movies;
    protected $movieService;
    protected $categoryService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Movies:Seeder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule movie API Service from https://www.themoviedb.org';

    public function __construct(MovieRepository $movies, MovieService $movieService, CategoryService $categoryService)
    {
        parent::__construct();

        $this->movies = $movies;
        $this->movieService = $movieService;
        $this->categoryService = $categoryService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->movieService->seedLatestMovie();
        $this->movieService->seedTopRatedMovies();
        $this->categoryService->seedCategories();
    }
}
