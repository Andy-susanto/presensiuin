<?php

namespace App\Console\Commands;

use App\Models\PangkatKemenag;
use Illuminate\Console\Command;

class PangkatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kemenag:pangkat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update data pangkat kemenag';

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

        function data()
        {
            $header = array(
                'Content-Type: application/json',
                'Authorization:' . token()
            );
            $cURLConnection = curl_init();
            curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.kemenag.go.id/v1/master/pangkat');
            curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $header);

            $response = curl_exec($cURLConnection);
            curl_close($cURLConnection);

            $decode = json_decode($response, true);

            for ($i = 0; $i < count($decode['data']); $i++) {
                PangkatKemenag::updateOrCreate(
                    [
                        'kode_pangkat' => $decode['data'][$i]['KODE_PANGKAT']
                    ],
                    [
                        'pangkat' => $decode['data'][$i]['PANGKAT'],
                        'gol_ruang' => $decode['data'][$i]['GOL_RUANG'],
                    ],
                );
            }
        }

        data();
        $this->newLine();
        $this->info('Done');
    }
}
