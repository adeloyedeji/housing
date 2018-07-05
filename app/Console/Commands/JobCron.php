<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class JobCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status of failed jobs to 1 to re-start the queue';

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
     * @return mixed
     */
    public function handle()
    {
        \DB::table('jobs')->update(array('status' => 1));
    }
}
