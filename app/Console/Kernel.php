<?php

namespace App\Console;

use App\Console\Commands\Reports\GenerateTagesmeldungCommand;
use App\Models\EmailQueue\EmailQueue;
use App\Models\EmailQueue\EmailQueueRepository;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    public function __construct(Application $app, Dispatcher $events)
    {
        parent::__construct($app, $events);
    }

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        //ovo radi, ali ne treba raditi ovde if-ove itd, izmjestiti u komandu
        $schedule->command('command:emailQueue')->everyFifteenMinutes();
        $schedule->command('command:generateTagesmeldung')->dailyAt('04:30');
        $schedule->command('command:checkTagesmeldung')->dailyAt('06:00');
        $schedule->command('command:emailTagesmeldung')->dailyAt('08:58');


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
//        $this->load(__DIR__.'/Commands/Reports');

        require base_path('routes/console.php');
    }
}
