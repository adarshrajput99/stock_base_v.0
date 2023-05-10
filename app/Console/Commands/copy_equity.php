<?php

namespace App\Console\Commands;
use Exception;
use Illuminate\Console\Command;
use App\Http\Controllers\profit;
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
            $object= app()->make(profit::class);
        $object->make_profit('2020-06-27','2020-08-27',200);
        }
        catch(Exception $e){
            echo $e;
        }
    }
}
