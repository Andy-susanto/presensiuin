<?php

namespace App\Console\Commands;

use App\Models\HariKerja;
use App\Models\Libur;
use Illuminate\Console\Command;
use Calendarific\Calendarific;
use Illuminate\Support\Carbon;

class CalendarCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calendar:generate {tanggal}';

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

        // print($this->argument('tanggal'));

        $key = '2393075340a011aaef4df972e34a20afe2ea866d';
        $country = 'ID';
        $tanggal = Carbon::parse($this->argument('tanggal'));
        $year = $tanggal->format('Y');
        $month = $tanggal->format('m');
        $day = null;
        $location = null;
        $types = ['national'];

        $ciapi = Calendarific::make(
            $key,
            $country,
            $year,
            $month,
            $day,
            $location,
            $types
        );
        foreach ($ciapi['response']['holidays'] as $key => $libur) {

            Libur::updateOrCreate(
                ['tanggal' => $libur['date']['iso']],
                ['libur' => $libur['name']]
            );

            HariKerja::updateOrCreate(
                [
                    'bulan' => $libur['date']['datetime']['month'],
                    'tahun' => $libur['date']['datetime']['year']
                ],
                ['jumlah' => $libur['date']['datetime']['day']]
            );
        }
    }
}
