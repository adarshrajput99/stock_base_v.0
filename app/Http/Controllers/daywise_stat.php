<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class daywise_stat extends Controller
{
    function stat_day(Request $request,$strike,$from,$to,$comisson,$call,$sl=50,$lot_size=50){
        $data=DB::table('stock_prices')->where('date','<=',$to)->where('date','>=',$from)->get();
        if($call){
            $profit_margin=$strike;
        }
        else {
            $profit_margin=$strike ; 
        }
        $streak_max=0;
        $streak_curr=0;
        //profit variables
        $max_profit =PHP_INT_MIN;
        $max_profit_date='';
        
        //loss variables
        $max_loss =PHP_INT_MAX;
        $max_loss_date='';
        

        
        

        $stoploss_dates=array();
        $array = array();
        foreach($data as $per_day_data){
            if($call){
                if($per_day_data->low<=$strike-$sl){
                    $stoploss_dates[$per_day_data->date]=$per_day_data->low;
                }
                
                $array[$per_day_data->date] = ($per_day_data->close - $profit_margin)*$lot_size-$comisson;
                
                
            }
            else{
                if($per_day_data->high > $strike + $sl){
                    $stoploss_dates[$per_day_data->date]=$per_day_data->high;
                    
                }
                
                $array[$per_day_data->date] = ($profit_margin-$per_day_data->close)*$lot_size-$comisson;
                
               
            }

            if($array[$per_day_data->date]>$max_profit){
                $max_profit = $array[$per_day_data->date];
                $max_profit_date=$per_day_data->date;
            }
            if($array[$per_day_data->date]<$max_loss){
                $max_loss = $array[$per_day_data->date];
                $max_loss_date=$per_day_data->date;
                
            }
            if($array[$per_day_data->date]<0){
                $streak_curr=0;
            }
            else{
                $streak_curr++;
                if($streak_max<$streak_curr){
                    $streak_max=$streak_curr;
                }
            }
            
        }
        $array['Most profit is reported on '.$max_profit_date] = $max_profit-$comisson;
        $array['Most loss is reported on '.$max_loss_date] = $max_loss-$comisson;
        $array['Maximum winning streak : '] = $streak_max;
        $array['Stop loss hit dates : '] = $stoploss_dates;
        
        $responsee= json_encode($array);

        return response($responsee, 200)
        ->header('Content-Type', 'application/json');


    }
}
