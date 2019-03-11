<?php
    
include('db.php');

function envoi($prenom,$nom,$email,$numero, $mdp){
        $database2 = getDB();
        $results = $database2 -> query("INSERT INTO utilisateur (prenom,nom,email,numero,mdp) VALUES('".$prenom."','".$nom ."','".$email."','".$numero."','".$mdp."')");
        return $results;
}

function envoi2($prenom,$nom,$email, $mdp){
        $database2 = getDB();
        $results = $database2 -> query("INSERT INTO utilisateur (prenom,nom,email,mdp) VALUES('".$prenom."','".$nom ."','".$email."','".$mdp."')");
        return $results;
}




if($_POST['prenom'] == "" or $_POST['nom'] == "" or $_POST['mail'] == "" or $_POST['mdp1'] != $_POST['mdp2']){
    echo '<meta http-equiv="refresh" content="1; URL=inscription.php?prenom='.$_POST['prenom'].'&nom='.$_POST['nom'].'&mail='.$_POST['mail'].'&num='.$_POST['num'].'">';
}
else{
    if($_POST['num'] != ""){
        envoi($_POST['prenom'],$_POST['nom'],$_POST['mail'],$_POST['num'],$_POST['mdp1']);
        echo '<meta http-equiv="refresh" content="1; URL=inscription.php">';
    }
    else{
        envoi2($_POST['prenom'],$_POST['nom'],$_POST['mail'],$_POST['mdp1']);
        echo '<meta http-equiv="refresh" content="1; URL=inscription.php">';
    }
}

?>