<?php

namespace App\Parser;


use App\Conso;

class Parser
{
    protected function save(\DateTime $date, int $value, int $id){
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