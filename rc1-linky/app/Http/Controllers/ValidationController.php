<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use Illuminate\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ValidationController extends Controller
{
    /*public function ValidationForm()
    {
        return view('pages.parametersEdit');
    }*/

    public function userForm()
    {


        DB::table('users')
            ->where('id', Auth::id())
            ->update(
                ['prenom' => Input::post('prenom'),
                    'name' => Input::post('name'),
                    'login_linky' => Input::post('login'),
                    'mdp_linky' => Input::post('pswd'),
                    'ville' => Input::post('ville'),
                    'logement' => Input::post('logement'),
                    'superficie' => Input::post('superficie'),
                    'habitants' => Input::post('habitants')]

            );

        return 'Mise à jour du profil';
    }
}
