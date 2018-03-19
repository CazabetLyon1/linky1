<?php

namespace App\Parser;


use App\Conso;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;

class FilePaser extends Parser
{

    public function loadFile(String $filename){
        $path = '/var/www/html/public/uploads/';
        $path = storage_path('app/');
        $ptr = fopen($path.$filename, "r");
        $contenu = fread($ptr, filesize($path.$filename));
        fclose($ptr);
        $contenu = explode(PHP_EOL, $contenu);
        unset($contenu[0]);
        unset($contenu[1]);
        $contenu = array_values($contenu);
        $contenu = implode(PHP_EOL, $contenu);
        $ptr = fopen($path.$filename, "w");
        fwrite($ptr, $contenu);

        Config::set('excel.csv.delimiter', ';');
        $data = Excel::load($path.$filename)->get();
        foreach ($data as $key => $value) {
            $conso = new Conso();
            $conso->horodate=DateTime::createFromFormat("Y-m-d-H:i:sP", str_replace_first('T','-',$value['horodate']));
            $conso->value=$value['valeur'];
            $conso->user_id= Auth::id();
            $conso->save();
        }
    }

}