<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Http\Request;

class DataGetter extends Controller
{
    public static function getMoy7($val)
    {
        $interval = new DateInterval('P7D')   ;
        $interval->invert= 1;
        $data = \DB::table('consos')
                            ->select('consos.value')
                            ->where('user_id', '=', $val)
                            ->where('consos.horodate', '>=', DATE_ADD( Carbon::now(), $interval ))
                            ->limit(2600)
                            ->avg('consos.value');

        //dd($data);
        if(!$data)
        {
            return 'no data';
        }
        return round($data, 2);
    }
    public static function getMoyprev($val)
    {
        $interval = new DateInterval('P1D')   ;
        $interval->invert= 1;
        $data = \DB::table('consos')
                            ->select('consos.value')
                            ->where('user_id', '=', $val)
                            ->where('consos.horodate', '>=', DATE_ADD( Carbon::now(), $interval ))
                            ->limit(2600)
                            ->avg('consos.value');

        //dd($data);
        if(!$data)
        {
            return 'no data';
        }
        return round($data, 2);
    }

    public static function getMaxprev($val)
    {
        $interval = new DateInterval('P1D')   ;
        $interval->invert= 1;
        $data = \DB::table('consos')
                            ->select('consos.value')
                            ->where('user_id', '=', $val)
                            ->where('consos.horodate', '>=', DATE_ADD( Carbon::now(), $interval ))
                            ->limit(2600)
                            ->max('consos.value');

        //dd($data);
        if(!$data)
        {
            return 'no data';
        }
        return round($data, 2);
    }

    public static function estimateCost($val)
    {
        return 'incoming';
    }

}
//faire class graphData
