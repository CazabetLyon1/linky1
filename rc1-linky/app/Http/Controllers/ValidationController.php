<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function ValidationForm()
    {
        return view('pages.parametersEdit');
    }

    public function UserForm(ValidationRequest $request)
    {
        $input = $request->only('prenom','name','login','pswd','ville','logement','superficie','habitants');

        $user = Auth::user();

        
        $user->prenom = $input['prenom'];
        $user->name = $input['name'];
        $user->login = $input['login'];
        $user->pswd = $input['pswd'];
        $user->ville = $input['ville'];
        $user->logement = $input['logement'];
        $user->habitants = $input['habitants'];


        return 'Mise à jour du profil';
    }
}
