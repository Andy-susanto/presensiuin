<?php

namespace App\Console\Commands;

use App\Models\SatkerKemenag as ModelsSatkerKemenag;
use Illuminate\Console\Command;

class SatkerKemenag extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'satker:kemenag';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Data Satker Kemenag';

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

        function satker()
        {
            $header = array(
                'Content-Type: application/json',
                'Authorization:' . token()
            );
            $cURLConnection = curl_init();
            curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.kemenag.go.id/v1/master/satker');
            curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $header);

            $response = curl_exec($cURLConnection);
            curl_close($cURLConnection);

            $decode = json_decode($response, true);

            for ($i = 0; $i < count($decode['data']); $i++) {
                ModelsSatkerKemenag::updateOrCreate(
                    [
                        'kode_satuan_kerja' => $decode['data'][$i]['KODE_SATUAN_KERJA']
                    ],
                    [
                        'kode_atasan' => $decode['data'][$i]['KODE_ATASAN'],
                        'satuan_kerja' => $decode['data'][$i]['SATUAN_KERJA']
                    ],
                );
            }
        }

        satker();
        $this->newLine();
        $this->info('Done');
    }
}
