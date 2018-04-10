<?php


namespace App\Http\Controllers;


use App\Jobs\RetrieveEnedisData;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;


class APIController extends Controller
{

    use DispatchesJobs;
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function retrieveData(){
        $status = ['status'=>'ok','error'=>null];
        $user = Auth::user();
        if(empty($user['login_linky']) || empty($user['mdp_linky'])){
            $status['status']='ko';
            $status['error']="Vous devez renseigner vos informations de connexion enedis";
        }else {
            $this->dispatch(new RetrieveEnedisData($user));
        }
        echo json_encode($status);
    }

}