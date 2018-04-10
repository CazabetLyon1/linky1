<?php

namespace App\Parser;

use DateTime;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;

class FilePaser extends Parser
{

    public function loadFile(String $filename, String $path, int $id){
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
            $this->save(DateTime::createFromFormat("Y-m-d-H:i:sP", str_replace_first('T','-',$value['horodate'])),floatval($value['valeur']),$id);
        }
    }

}