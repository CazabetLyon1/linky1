<?php


namespace App\Http\Controllers;


use App\Parser\Parser;
use DateInterval;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{

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
            $begin = new DateTime();
            $begin->sub(new DateInterval('P1Y'));
            $client = new Client();
            $res = $client->request('POST', 'http://api/', [
                'form_params' => [
                    'login' => $user->login_linky,
                    'mdp' => $user->mdp_linky,
                    'type' => 'hour',
                    'debut' => $begin->format('d/m/Y'),
                    'fin' => date('d/m/Y')
                ]
            ]);

            $result = json_decode($res->getBody(), true);
            if ($result['status'] == "ok") {
                $parser = new Parser();
                $last=0;
                foreach ($result['data'] as $conso) {
                    if($last==$conso['conso'] && $last==0){
                        $last=$conso['conso'];
                    }else {
                        $parser->save(DateTime::createFromFormat("d-m-Y-H:i", str_replace_first('+', '-', str_replace_first('h', ':', $conso['time']))), floatval($conso['conso']), $user->id);
                    }
                }
            }else{
                $status['status']="ko";
                $status['error']=$result['error'][0];
            }
        }

        echo response()->json($status);
    }

}