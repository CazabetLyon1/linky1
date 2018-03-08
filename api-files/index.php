<?php

function errorPhp($errno, $errstr) {
    $returnData=array('status'=>'ko','data'=>null,'error'=>array('Erreur lors de la récupération des données Enedis'));
    header('Content-Type: application/json');
    echo json_encode($returnData);
    die();
}

set_error_handler("errorPhp");

$returnData=array('status'=>null,'data'=>null,'error'=>array());

if(empty($_POST['login'])){
    $returnData['error'][]="Vous devez définir un login";
}

if(empty($_POST['mdp'])){
    $returnData['error'][]="Vous devez définir un mot de passe";
}

if(empty($_POST['type'])){
    $returnData['error'][]="Vous devez définir un type de données";
}elseif (!in_array($_POST['type'],array('hour','day','month','year'))){
    $returnData['error'][]="Le type est incorrect";
}

if(empty($returnData['error'])){
    //Semaphore maison
    $cmpt = 0;
    do {
        if($cmpt>0) {
            sleep(1);
        }
        $sem = fopen('sem.txt', 'r+');
        $value = fgets($sem);
        fclose($sem);
        $cmpt++;
    }while($value!='1' && $cmpt<10);
    if($cmpt>9){
        $returnData['status'] = 'ko';
        $returnData['error'][] = 'Le serveur est occupé, réessayez plus tard';
    }else {
        try {
            $sem = fopen('sem.txt', 'r+');
            fputs($sem, 0);
            fclose($sem);
            $debut = "";
            $fin = "";
            if ($_POST['type'] == "hour") {
                if (!empty($_POST['debut'])) {
                    $debut = $_POST['debut'];
                    if (!empty($_POST['fin'])) {
                        $fin = $_POST['fin'];
                    }
                }
            }
            exec('./gen_json.sh ' . escapeshellcmd($_POST['login']) . ' ' . escapeshellcmd($_POST['mdp']) . ' ' . escapeshellcmd($_POST['type']) . ' ' . escapeshellcmd($debut) . ' ' . escapeshellcmd($fin));
            $sem = fopen('sem.txt', 'r+');
            fputs($sem, 1);
            fclose($sem);
            $json = file_get_contents('export_' . $_POST['type'] . 's_values.json');
            unlink('export_' . $_POST['type'] . 's_values.json');
            $returnData['data'] = json_decode($json, true);
            $returnData['status'] = 'ok';
        }catch (Throwable $t){
            $returnData['error'][] = "";
            $returnData['status'] = 'ko';
        }
    }
}else{
    $returnData['status']='ko';
}

header('Content-Type: application/json');
echo json_encode($returnData);
