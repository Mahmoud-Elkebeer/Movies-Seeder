<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\MoviesSeederJob;

class MoviesSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:moviesSeeder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule movie API Service from https://www.themoviedb.org';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        dispatch(new MoviesSeederJob());
    }
}
