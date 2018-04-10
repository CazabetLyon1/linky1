<?php

namespace App\Parser;


use App\Conso;
use Illuminate\Support\Facades\Auth;

class Parser
{
    public function save(\DateTime $date, float $value, int $id){
        try {
            $conso = new Conso();
            $conso->horodate = $date;
            $conso->value = $value;
            $conso->user_id = $id;
            $conso->save();
        }catch (\Throwable $t){

        }
    }

}