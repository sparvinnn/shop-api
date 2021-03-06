<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Controllers\GivController as giv;

class initDataSeeding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get data from giv api and seeding in db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $process = new giv;
        $process->init();
        return 0;
    }
}
