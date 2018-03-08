<?php

$returnData=array('status'=>null,'data'=>null,'error'=>array());

if(empty($_POST['login'])){
    $returnData['error'][]="Vous devez définir un login";
}

if(empty($_POST['mdp'])){
    $returnData['error'][]="Vous devez définir un mot de passe";
}

if(empty($_POST['type'])){
    $returnData['error'][]="Vous devez définir un type de données";
}elseif (!in_array($_POST['type'],array('heure','jour','mois','annee'))){
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
        $sem = fopen('sem.txt', 'r+');
        fputs($sem, 0);
        fclose($sem);
        exec('./gen_json.sh ' . escapeshellcmd($_POST['login']) . ' ' . escapeshellcmd($_POST['mdp']));
        $sem = fopen('sem.txt', 'r+');
        fputs($sem, 1);
        fclose($sem);
        $json="";
        switch ($_POST['type']){
            case 'heure':
                $json=file_get_contents('export_hours_values.json');
                break;
            case 'jour':
                $json=file_get_contents('export_days_values.json');
                break;
            case 'mois':
                $json=file_get_contents('export_months_values.json');
                break;
            case 'annee':
                $json=file_get_contents('export_years_values.json');
                break;

        }
        unlink('export_days_values.json');
        unlink('export_hours_values.json');
        unlink('export_months_values.json');
        unlink('export_years_values.json');
        $returnData['data']=json_decode($json,true);
        $returnData['status'] = 'ok';
    }
}else{
    $returnData['status']='ko';
}

header('Content-Type: application/json');
echo json_encode($returnData);
