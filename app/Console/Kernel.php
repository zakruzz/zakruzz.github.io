<?php

namespace App\Console;

use App\Entities\Event\TaskEvent;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function () {

            $task                       = TaskEvent::where('status' == 'AKTIF')->get();

            foreach ($task as $result){
                $timeNow                    = Carbon::now()->format('Y-m-d H:i');
                $timeEnd                    = Carbon::make($result->deadline)->format('Y-m-d H:i');

                if ($timeNow == $timeEnd){

                    $result->status           = 'NONAKTIF';
                    $result->save();

                }
            }

        })->everyMinute()->sendOutputTo('storage/logs/crontab.log');;

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
