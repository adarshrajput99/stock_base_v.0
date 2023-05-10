<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class profit extends Controller
{
    function make_profit($from , $to , $strike , $symbol='ADANIENT'){
        $data=DB::table('adain')->where('date','<',$to)->where('date','>',$from)->where('symbol','=',$symbol)->get();

        $profit_max_all = 0;
            $profit_max_all_date='';
            $stock_price=0;
        foreach($data as $da){
            $profit_max=$da->High - $strike;
            $profit_low = $da->Low - $strike;


            if($profit_max > $profit_max_all){
                $profit_max_all = $profit_max;
                $profit_max_all_date=$da->date;
                $stock_price = $da->High;
            }
            if($profit_low>$profit_max_all){
                $profit_max_all=$profit_low;
                $profit_max_all_date=$da->date;
                $stock_price = $da->High;
            }
            if($profit_max<0){
                echo 'The Loss is reported througout the '.$da->date.' maximum : '.$profit_max.' and minimum :'.$profit_low.PHP_EOL;
            }
            else{
                echo 'The Profit is reported on the '.$da->date.' maximum : '.$profit_max.' and minimum :'.$profit_low.PHP_EOL;
            }

        }

        echo 'The Max Profit is reported on the '.$profit_max_all_date.' maximum : '.$profit_max_all.' Max price : '.$stock_price.PHP_EOL;
    }
}
