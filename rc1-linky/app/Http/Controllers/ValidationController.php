<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use Illuminate\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ValidationController extends Controller
{
    public function ValidationForm()
    {
        return view('pages.parametersEdit');
    }

    public function userForm(ValidationRequest $request)
    {
        $input = $request->only('prenom','name','login','pswd','ville','logement','superficie','habitants');

        $user = Auth::user();


        $user->prenom = $request['prenom'];
        $user->name = $input['name'];
        $user->login = $input['login'];
        $user->pswd = $input['pswd'];
        $user->ville = $input['ville'];
        $user->logement = $input['logement'];
        $user->superficie = $input['superficie'];
        $user->habitants = $input['habitants'];

        $user->save();

        return 'Mise à jour du profil';
    }
}
