<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Http\Request;

class Graph extends Controller
{
    public static function getGraph($val, $mode)
    {
        if($mode == 'Moy7Prev')
        {
            return this.self::getGraphmoy7Prev($val);
        }
        $data = \DB::table('consos')
                            ->select('horodate','value')
                            ->where('user_id', '=', $val)
                            ->get()->toJson();

        //dd($data);
        return $data;
    }
    //TODO : check results
    public static function getGraphmoy7Prev($val)
    {
        $interval = new DateInterval('P7D')   ;
        $interval->invert= 1;
        $data = \DB::table('consos')
            ->select(DB::raw("DATE_FORMAT(consos.horodate, '%Y-%c-%d') as m_date , avg(consos.value) as m_value"))
            ->where('user_id', '=', $val)
            ->where('consos.horodate', '>=', DATE_ADD( Carbon::now(), $interval ))
            ->groupBy('m_date')
            ->orderBy('m_date', 'asc')
            //->limit(7)
            ->get()/*->toJson()*/;
        $data = json_encode(array_slice(json_decode($data, true), 1));
        //dd($data);
        return $data;
    }

    public static  function getGraphType($val)
    {
        $data = \DB::table('consos')
            ->select(DB::raw("WEEKDAY(consos.horodate) as m_day, AVG(consos.value) as m_value"))
            ->where('user_id', '=', $val)
            ->groupBy('m_day')
            ->get()->toJson();
        //dd($data);
        return $data;
    }

    public static  function getGraphTimeConso($val)
    {
        $interval = new DateInterval('P7D')   ;
        $interval->invert= 1;
        $data = \DB::table('consos')
            ->select(DB::raw("TIME_FORMAT(consos.horodate, '%H:%i') as m_time,WEEKDAY(consos.horodate) as m_day, AVG(consos.value) as m_value"))
            ->where('user_id', '=', $val)
            ->groupBy('m_day', 'm_time')
            ->get()->toJson();
        //dd($data);
        return $data;
    }

}
//faire class graphData
