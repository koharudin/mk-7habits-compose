<?php

namespace App\Console\Commands;

use App\Models\QuizAttempt;
use Illuminate\Console\Command;

class TestQuizAttempt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-quiz-attempt';

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
        $attempt = QuizAttempt::where("uuid","113f560f-7122-47cc-a3c1-b43693149dc0")->get()->first();
        $this->info("Quiz Attempt ");
        $this->info($attempt);
        $score = $attempt->calculate_score();
        $this->info("end...".$score);
    }
}
