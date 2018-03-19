<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class Graph extends Controller
{
    public static function getGraph($val, $mode)
    {
        $data = \DB::table('consos')
                            ->select('horodate','value')
                            ->where('user_id', '=', $val)
                            ->limit(2600)->get()->toJson();

        //dd($data);
        return $data;
    }

}
//faire class graphData
