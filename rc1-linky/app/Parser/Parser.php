<?php

namespace App\Parser;


use App\Conso;
use Illuminate\Support\Facades\Auth;

class Parser
{
    protected function save(\DateTime $date, int $value){
        //TODO check if exist
        $conso = new Conso();
        $conso->horodate=$date;
        $conso->value=$value;
        $conso->user_id= Auth::id();
        $conso->save();
    }

}