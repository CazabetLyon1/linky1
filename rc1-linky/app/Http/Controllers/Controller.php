<?php

namespace App\Http\Controllers;

use App\Parser\FilePaser;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function testExcel(){
        $parser = new FilePaser();
        $parser->loadFile("releve.csv");
    }
}

class DataForm{

    public static function UserForm(){
        $nom=Input::get('nom');
        $prenom=Input::get('prenom');
        $ville=Input::get('ville');
        $logement=Input::get('logement');
        $superficie=Input::get('superficie');
        $habitants=Input::get('habitants');
    }
}
