<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class AutoCompleteTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-complete-tasks';

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
    Task::where('status', 'pending')
        ->update(['status' => 'incomplete']);
    
    $this->info('Pending tasks marked as incomplete.');
}
}
