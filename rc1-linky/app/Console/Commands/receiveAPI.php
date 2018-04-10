<?php

namespace App\Console\Commands;

use App\Parser\Parser;
use DateInterval;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class receiveAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'receiveAPI';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recupère les données de l\'api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function handle()
    {
        $users = \DB::table('users')
            ->select('id','login_linky','mdp_linky')
            ->where('login_linky', '!=', null)
            ->where('mdp_linky', '!=', null)
            ->get();

        foreach ($users as $user){
            $yesterday = new DateTime();
            $yesterday->sub(new DateInterval('P1D'));
            $client = new Client();
            $res = $client->request('POST', 'http://api/', [
                'form_params' => [
                    'login' => $user->login_linky,
                    'mdp' => $user->mdp_linky,
                    'type' => 'hour',
                    'debut' => $yesterday->format('d/m/Y'),
                    'fin' => date('d/m/Y')
                ]
            ]);

            $result = json_decode($res->getBody(),true);
            if($result['status']=="ok"){
                $parser = new Parser();
                foreach ($result['data'] as $conso){
                    $parser->save(DateTime::createFromFormat("d-m-Y-H:i", str_replace_first('+','-',str_replace_first('h',':',$conso['time']))),floatval($conso['conso']),$user->id);
                }
            }
        }
    }
}
