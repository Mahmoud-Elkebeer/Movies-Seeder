<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\MovieService;
use Illuminate\Http\Request;
use App\Repositories\MovieRepository;
use Symfony\Component\HttpFoundation\Response;

class MovieController extends Controller
{
    protected $movieService;
    protected $movieRepository;

    public function __construct(MovieRepository $movieRepository, MovieService $movieService) {
        $this->movieService = $movieService;
        $this->movieRepository = $movieRepository;
    }

    public function index(Request $request)
    {
        $movies = $this->movieRepository->search($request)->paginate(20);
        return response()->json($movies, Response::HTTP_OK);
    }
}
