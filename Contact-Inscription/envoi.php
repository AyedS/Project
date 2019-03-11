<?php
include('db.php');

function envoi($prenom,$nom,$email,$numero, $message){
        $database1 = getDB();
        $results = $database1 -> query("INSERT INTO contact (prenom,nom,email,numero,message) VALUES('".$prenom."','".$nom ."','".$email."','".$numero."','".$message."')");
        return $results;
}

function envoi2($prenom,$nom,$email, $message){
        $database1 = getDB();
        $results = $database1 -> query("INSERT INTO contact (prenom,nom,email,message) VALUES('".$prenom."','".$nom ."','".$email."','".$message."')");
        return $results;
}




if($_POST['prenom'] == "" or $_POST['nom'] == "" or $_POST['mail'] == "" or $_POST['message'] == ""){
    echo '<meta http-equiv="refresh" content="1; URL=contact.php?prenom='.$_POST['prenom'].'&nom='.$_POST['nom'].'&mail='.$_POST['mail'].'&message='.$_POST['message'].'">';
}
else{
    if($_POST['num'] != ""){
        envoi($_POST['prenom'],$_POST['nom'],$_POST['mail'],$_POST['num'],$_POST['message']);
        echo '<meta http-equiv="refresh" content="1; URL=contact.php">';
    }
    
    if($_POST['num'] == ""){
        envoi2($_POST['prenom'],$_POST['nom'],$_POST['mail'],$_POST['message']);
        echo '<meta http-equiv="refresh" content="1; URL=contact.php">';
    }
}

?>