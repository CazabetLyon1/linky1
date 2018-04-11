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
                ['prenom' => 1, 'name' => 1, 'login_linky' => 1, 'mdp_linky' => 1, 'ville' => 1, 'logement' => 1, 'superficie' => 1, 'habitants' => 1]

            );

        return 'Mise à jour du profil';
    }
}
