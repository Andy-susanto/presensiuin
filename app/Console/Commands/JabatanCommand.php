<?php

namespace App\Console\Commands;

use App\Models\JabatanKemenag;
use Illuminate\Console\Command;

class JabatanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kemenag:jabatan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Data Jabatan Kemenag';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        function token()
        {
            $curl = curl_init();

            $dataLogin = array(
                'email' => 'firdaus.aryax@gmail.com',
                'password' => '123456'
            );

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.kemenag.go.id/v1/auth/login',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $dataLogin,
                CURLOPT_HTTPHEADER => array(
                    'Cookie: cookiesession=dataToken'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $decodeLogin = json_decode($response, true);

            Session(['token' => $decodeLogin['token']]);
            return 'Bearer ' . $decodeLogin['token'];
        }

        function jabatan()
        {
            $header = array(
                'Content-Type: application/json',
                'Authorization:' . token()
            );
            $cURLConnection = curl_init();
            curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.kemenag.go.id/v1/master/jabatan');
            curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $header);

            $response = curl_exec($cURLConnection);
            curl_close($cURLConnection);

            $decode = json_decode($response, true);

            for ($i = 0; $i < count($decode['data']); $i++) {
                JabatanKemenag::updateOrCreate(
                    [
                        'kode_jabatan' => $decode['data'][$i]['KODE_JABATAN']
                    ],
                    [
                        'jabatan' => $decode['data'][$i]['JABATAN'],
                        'tampil_jabatan' => $decode['data'][$i]['TAMPIL_JABATAN'],
                        'usia_pensiun' => $decode['data'][$i]['USIA_PENSIUN'],
                        'tunjangan' => $decode['data'][$i]['TUNJANGAN'],
                        'grade' => $decode['data'][$i]['GRADE'],
                    ],
                );
            }
        }

        jabatan();
        $this->newLine();
        $this->info('Done');
    }
}
