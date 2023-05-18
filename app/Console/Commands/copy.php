<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use App\Http\Controllers\daywise_stat;
class copy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:copy';

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
            $object= app()->make(daywise_stat::class);
        $object->stat_day(5450,'2019-11-15','2019-12-04',100,false);
        }
        catch(Exception $e){
            echo $e;
        }

    }
}
