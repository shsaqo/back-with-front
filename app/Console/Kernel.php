<?php

namespace App\Console;

use App\Models\SaleTime;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


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
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            DB::table('sale_times')->where('end_date', '<=', now()->addMinutes(5))
                ->update([
                    'end_date' => now()->addDay()
                ]);
        });

        $schedule->call(function () {
           DB::table('comments')->where('like', '>', 0)->increment('like');
        });

        $schedule->call(function () {
            $filesInFolder = File::files('images/multiSelectFiles');
            $files = array();
            foreach($filesInFolder as $path) {
                array_push($files, 'multiSelectFiles/'.basename($path));
            }
            foreach($files as $file) {
                if (!DB::table('sliders')->where('slider_photo',$file)->first()) {
                    File::delete('images/'.$file);
                }
            }
        })->everySixHours();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
