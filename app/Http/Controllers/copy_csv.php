<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use SplFileObject;
class copy_csv extends Controller
{
    public function importDataFromCSV()
{
    $filePath = storage_path('data/fobhav.csv');
    $filename = '/home/adarsh/stock_base_v.0/storage/data/fobhav.csv';

    $file = new SplFileObject($filename, 'r');
    $headerRow = $headerRow = [
        'INSTRUMENT',
        'SYMBOL',
        'EXPIRY_DT',
        'STRIKE_PR',
        'OPTION_TYP',
        'OPEN',
        'HIGH',
        'LOW',
        'CLOSE',
        'SETTLE_PR',
        'CONTRACTS',
        'VAL_INLAKH',
        'OPEN_INT',
        'CHG_IN_OI',
        'TIMESTAMP',
        'Unnamed: 15',
    ];
    // Skip the first 5 lines
    $file->seek(DB::table('table_name')->count());

    while (!$file->eof()) {
        $line = $file->fgetcsv();

        $rowData = array_combine($headerRow, $line);
        try{
            DB::table('table_name')->insert($rowData);
        }
        catch(Exception $e){
            continue;
        }

    }



    echo "Data imported successfully";
}
public function importDataFromCSV_equity()
{
    $filePath = '/home/adarsh/stock_base_v.0/storage/data/NIFTY50 VALUE 20.csv';

    if (($handle = fopen($filePath, 'r')) !== false) {
        // Skip header row
        fgetcsv($handle);

        while (($data = fgetcsv($handle)) !== false) {
            $rowData = [
                'date' => $data[0],
                'open' => $data[1],
                'high' => $data[2],
                'low' => $data[3],
                'close' => $data[4],
                'volume' => $data[5],
                'turnover' => $data[6],

            ];

            // Insert data into database
            DB::table('stock_prices')->insert($rowData);
        }

        fclose($handle);
    }
}
}
