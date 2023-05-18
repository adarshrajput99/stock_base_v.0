<?php

namespace App\Console\Commands;
use Exception;
use Illuminate\Console\Command;
use App\Http\Controllers\copy_csv;
class copy_equity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:copy_equity';

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


        try{
            $object= app()->make(copy_csv::class);
        $object->importDataFromCSV();
        }
        catch(Exception $e){
            echo $e;
        }
    }
}
