<?php

namespace App\Jobs;

use App\Parser\Parser;
use App\User;
use DateInterval;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Auth\Authenticatable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class RetrieveEnedisData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;

    /**
     * Create a new job instance.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        Log::info('1');
        $begin = new DateTime();
        $begin->sub(new DateInterval('P1Y'));
        $client = new Client();
        $res = $client->request('POST', 'http://api/', [
            'form_params' => [
                'login' => $this->user->login_linky,
                'mdp' => $this->user->mdp_linky,
                'type' => 'hour',
                'debut' => $begin->format('d/m/Y'),
                'fin' => date('d/m/Y')
            ]
        ]);

        $result = json_decode($res->getBody(), true);
        var_dump($result);
        if ($result['status'] == "ok") {
            Log::info('2');
            $parser = new Parser();
            $last=0;
            foreach ($result['data'] as $conso) {
                Log::info('3');
                if($last==$conso['conso'] && $last==0){
                    $last=$conso['conso'];
                }else {
                    $parser->save(DateTime::createFromFormat("d-m-Y-H:i", str_replace_first('+', '-', str_replace_first('h', ':', $conso['time']))), floatval($conso['conso']), $this->user->id);
                }
            }
        }
    }
}
