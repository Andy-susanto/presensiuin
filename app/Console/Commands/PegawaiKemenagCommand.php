<?php

namespace App\Console\Commands;

use App\Models\Pegawai;
use Illuminate\Console\Command;

class PegawaiKemenagCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kemenag:pegawai';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Data Pegawai Kemenag';

    /**
     * Execute the console command.
     */

    public function handle()
    {

        function doSplitName($name)
        {
            $results = array();

            $r = explode(' ', $name);
            $size = count($r);

            //check first for period, assume salutation if so
            if (mb_strpos($r[0], '.') === false) {
                $results['salutation'] = '';
                $results['first'] = $r[0];
            } else {
                $results['salutation'] = $r[0];
                $results['first'] = $r[1];
            }

            //check last for period, assume suffix if so
            if (mb_strpos($r[$size - 1], '.') === false) {
                $results['suffix'] = '';
            } else {
                $results['suffix'] = $r[$size - 1];
            }

            //combine remains into last
            $start = ($results['salutation']) ? 2 : 1;
            $end = ($results['suffix']) ? $size - 2 : $size - 1;

            $last = '';
            for ($i = $start; $i <= $end; $i++) {
                $last .= ' ' . $r[$i];
            }
            $results['last'] = trim($last);

            return $results;
        }

        // login token
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

        function data($start, $limit = null)
        {
            $header = array(
                'Authorization:' . token(),
            );

            $dataPost = array(
                'satker' => '11130000000000',
                'start' => $start,
                'limit' => $limit
            );

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.kemenag.go.id/v1/pegawai',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $dataPost,
                CURLOPT_HTTPHEADER => $header,
            ));

            $response = curl_exec($curl);
            curl_close($curl);

            $decode = json_decode($response, true);
            for ($i = 0; $i < count($decode['data']); $i++) {
                // print_r(doSplitName($decode['data'][$i]['NAMA_LENGKAP']));
                Pegawai::updateOrCreate(
                    [
                        'nip' => $decode['data'][$i]['NIP']
                    ],
                    [
                        'nip_baru'           => $decode['data'][$i]['NIP_BARU'],
                        'nama_pegawai'       => $decode['data'][$i]['NAMA_LENGKAP'],
                        'kode_level_jabatan' => $decode['data'][$i]['KODE_LEVEL_JABATAN'],
                        'pangkat'            => $decode['data'][$i]['PANGKAT'],
                        'gol_ruang'          => $decode['data'][$i]['GOL_RUANG'],
                        // 'masa_kerja_tahun'   => $decode['data'][$i]['MASA_KERJA_TAHUN'],
                        // 'masa_kerja_bulan'   => $decode['data'][$i]['MASA_KERJA_BULAN'],
                        'tipe_jabatan'       => $decode['data'][$i]['TIPE_JABATAN'],
                        'tampil_jabatan'     => $decode['data'][$i]['TAMPIL_JABATAN'],
                        'tmt_jabatan'        => $decode['data'][$i]['TMT_JABATAN'],
                        'kode_satker_1'      => $decode['data'][$i]['KODE_SATKER_1'],
                        'satker_1'           => $decode['data'][$i]['SATKER_1'],
                        'kode_satker_2'      => $decode['data'][$i]['KODE_SATKER_2'],
                        'satker_2'           => $decode['data'][$i]['SATKER_2'],
                        'kode_satker_3'      => $decode['data'][$i]['KODE_SATKER_3'],
                        'satker_3'           => $decode['data'][$i]['SATKER_3'],
                        'kode_satker_4'      => $decode['data'][$i]['KODE_SATKER_4'],
                        'satker_4'           => $decode['data'][$i]['SATKER_4'],
                        'kode_satker_5'      => $decode['data'][$i]['KODE_SATKER_5'],
                        'satker_5'           => $decode['data'][$i]['SATKER_5'],
                        'satuan_kerja'       => $decode['data'][$i]['SATUAN_KERJA'],
                    ],
                );
            }
        }

        // data(0);
        data(500);
    }
}
