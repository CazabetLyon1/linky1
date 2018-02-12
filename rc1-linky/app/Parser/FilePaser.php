<?php

namespace App\Parser;


use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;

class FilePaser extends Parser
{

    public function loadFile(String $filename){
        $path = '/var/www/html/public/uploads/';
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
        $conso=[];
        foreach ($data as $key => $value) {
            $conso[]=['date'=>$value['horodate'],'valeur'=>$value['valeur']];
        }
        var_dump($conso);
    }

}