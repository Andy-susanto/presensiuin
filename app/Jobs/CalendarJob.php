<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class CalendarJOb implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $tanggal;
    public function __construct($tanggal)
    {
        $this->tanggal = $tanggal;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Artisan::call('calendar:generate',['tanggal'=>$this->tanggal]);
    }
}
