<?php

namespace App\Console\Commands;

use App\Models\Habits;
use Illuminate\Console\Command;

class HabitsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:habits-generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $this->info("Generating Habits' Activities");
        Habits::generate();
    }
}
