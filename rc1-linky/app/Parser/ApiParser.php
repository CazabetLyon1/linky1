<?php

namespace App\Parser;

use GuzzleHttp\Client;

class ApiParser extends Parser
{

    public function getHourValues(\DateTime $debut, \DateTime $fin){

    }

    public function getDayValues(){
        return $this->sendRequest("day");
    }

    public function getMonthValues(){
        return $this->sendRequest("month");
    }

    public function getYearValue(){
        return $this->sendRequest("year");
    }

    private function sendRequest(String $type){
        //TODO get info from param
        $client = new Client();
        $response = $client->request('POST', 'http://api', [
            'form_params' => [
                'login' => 'abc',
                'mdp' => '123',
                'type' => $type
            ]
        ]);
        $response = json_decode($response,true);
        if($response['status']=="ok"){
            return $response['data'];
        }else{
            throw new \Exception($response['errors'][0]);
        }
    }
}