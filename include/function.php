<?php
 function mail_free():bool{
     $membre = bdd_select('SELECT id FROM membre WHERE mail =?' [$_POST['email']]);

     if (!$membre){
         return true;
     }
     else {
         return false;
     }
 }

function bdd_delete(string $query, array $params= [ ]):int{
    require 'pdo.php';

    if ($params){
        $req = $bdd->prepare($query);
        $req->execute($params);
    }

    else{
        $req = $bdd->query($query);
    }


    $deleted = $req->rowCount();

    return $deleted;
}


function bdd_insert(string $query, array $params= [ ]){
    require 'pdo.php';

    if ($params){
        $req = $bdd->prepare($query);
        $req->execute($params);
    }

    else{
        $req = $bdd->query($query);
    }


    $inserted = $req->rowCount();

    return $inserted;
}





function bdd_select(string $query, array $params=[]){
    require 'pdo.php';

    if ($params){
        $req = $bdd->prepare($query);
        $req->execute($params);
    }

    else{
        $req = $bdd->query($query);
    }

    $data = $req-> fetchAll;

    return $data;
}
function bdd_update(string $query, array $params= [ ]):int{
    require 'pdo.php';

    if ($params){
        $req = $bdd->prepare($query);
        $req->execute($params);
    }

    else{
        $req = $bdd->query($query);
    }


    $uptdated = $req->rowCount();

    return $updated;
}
