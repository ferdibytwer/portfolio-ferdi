<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Register the commands for your application.
     */
    // protected $commands = [
    //     \App\Console\Commands\UploadToDrive::class,
    // ];
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
    protected function schedule(Schedule $schedule)
    {
        // Menjalankan command setiap hari jam 2 pagi (ubah sesuai kebutuhan)
        $schedule->command('gdrive:upload')->monthlyOn(1, '03:00');
        $schedule->command('backup:run --only-db')->weekly();

        // Tambahan scheduler lain kalau ada...
    }
}
