<?php

namespace App\Jobs;

use App\Http\Services\CategoryService;
use App\Http\Services\MovieService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;

class MoviesSeederJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {

    }

    public function handle(MovieService $movieService, CategoryService $categoryService)
    {
        $movieService->seedLatestMovie();
        $movieService->seedTopRatedMovies();
        $categoryService->seedCategories();
    }
}
