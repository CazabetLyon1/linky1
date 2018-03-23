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
                            ->limit(2600)->get()->toJson();

        //dd($data);
        return $data;
    }
    public static function getGraphmoy7Prev($val)
    {
        $interval = new DateInterval('P360D')   ;
        $interval->invert= 1;
        $data = \DB::table('consos')
            ->select(DB::raw("DATE_FORMAT(consos.horodate, '%d-%b-%Y') as m_date, avg(consos.value) as m_value"))
            ->where('user_id', '=', $val)
            ->where('consos.horodate', '>=', DATE_ADD( Carbon::now(), $interval ))
            ->groupBy('m_date')
            ->limit(7)
            ->get()->toJson();
        $data = json_encode(array_slice(json_decode($data, true), 1));
        //dd($data);
        return $data;
    }

}
//faire class graphData
