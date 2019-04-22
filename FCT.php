<?php
function getBD(){
    $bdd=new PDO('mysql:host=localhost:8889;dbname=adopt_your_job;charset=utf8','root','root');
    return $bdd;
}

function getRegion(){
    $bd=getBD();
    $reg=$bd -> query('SELECT * FROM carte');
    echo '<MAP name="map1">';
    while($region=$reg->fetch()){
        echo '<AREA id=hover ';
        echo 'HREF="../recherche/region.php?reg='.$region['ID'].'" ';
        echo 'SHAPE="poly" ';
        echo 'ALT="'.$region['title_alt'].'" ';
        echo' TITLE="'.$region['title_alt'].'" ';
        echo 'COORDS=" '.$region['coords'].'" ';
        echo '/> ';
        echo '<br/>';
    }
    echo '</MAP>';
}
function topnav(){
    if(isset($_SESSION['client'])){
        echo '<div class="topnav">
        <div class="conn"><a href="../traitement/deco.php">Deconnexion</a></div>
        <div class="con"><a href="../client/contact.php">Contact</a></div>
        <div class="rec"><a href="../recherche/recherche.php">Recherche</a></div>
        <div class="acc"><a href="../index/index.php">Accueil</a></div>
        <div class="logo"><img src="../images/logo1.png"></div>
        <div class="titre">Adopt your job</div>  
        </div> ';
    }
    else{
        echo '<div class="topnav">
        <div class="conn"><a href="../client/connexion.php">Connexion</a></div>
        <div class="con"><a href="../client/contact.php">Contact</a></div>
        <div class="ins"><a href="../client/inscription.php">Inscription</a></div>
        <div class="rec"><a href="../recherche/recherche.php">Recherche</a></div>
        <div class="acc"><a href="../index/index.php">Accueil</a></div>
        <div class="logo"><img src="../images/logo1.png"></div>
        <div class="titre">Adopt your job</div>  
        </div> ';
    }
}

/* ---- inscription ---- */
function envoi_inscr($prenom,$nom,$email,$numero, $mdp){
    $database2 = getBD();
    $results = $database2 -> query("INSERT INTO utilisateur (prenom,nom,email,numero,mdp) VALUES('".$prenom."','".$nom ."','".$email."','".$numero."','".$mdp."')");
    return $results;
}

function envoi2_inscr($prenom,$nom,$email, $mdp){
    $database2 = getBD();
    $results = $database2 -> query("INSERT INTO utilisateur (prenom,nom,email,mdp) VALUES('".$prenom."','".$nom ."','".$email."','".$mdp."')");
    return $results;
}


function test_inscr($nom,$prenom,$tel,$age,$mail,$mailconf,$mdpconf,$mdp){
    $nomlength=strlen($nom);
    $prenomlength=strlen($prenom);
    $tellength=strlen($tel);
    $agelength=strlen($age);
    $mdplength=strlen($mdp);
    $maillength=strlen($mail);
    if($mdpconf==$mdp){
        if($mail==$mailconf){
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                if($nomlength<=255 AND $prenomlength<=255 AND $agelength<=20 AND $tellength<=255 AND $mdplength<=255){
                    if($maillength<=255){
                        if(user_exist($mail)){
                            echo'yes!';
                            return true;
                        }
                        else{
                            $erreur="Utilisateur deja existant!! Utilise un autre mail Sal Bof";
                        echo "<meta http-equiv='refresh' content='1;url=../client/inscription.php?age=".$age."
                        &nom=".$nom."&prenom=".$prenom."&erreur=".$erreur."'/>";
                        }
                    }
                    else{
                        $erreur="Mail trop long(255 caractéres maximum)";
                        echo "<meta http-equiv='refresh' content='1;url=../client/inscription.php?age=".$age."
                        &nom=".$nom."&prenom=".$prenom."&erreur=".$erreur."'/>";
                    }
                }
                else{
                    $erreur="Identifiants trop longs(255 caractéres maximum)";
                    echo "<meta http-equiv='refresh' content='1;url=../client/inscription.php?age=".$age."
                    &mail=".$mail."&erreur=".$erreur."'/>";
                }
            }
            else{
                $erreur="Mail incorrect";
                echo "<meta http-equiv='refresh' content='1;url=../client/inscription.php?age=".$age."
                &nom=".$nom."&prenom=".$prenom."&erreur=".$erreur."'/>";
            }
        }
        else{
            $erreur="Vos adresses mails ne correspondent pas";
        echo "<meta http-equiv='refresh' content='1;url=../client/inscription.php?nom=".$nom."
        &prenom=".$prenom."&age=".$age."&mail=".$mail."&erreur=".$erreur."'/>";
        }
    }
    else{
        $erreur="Vos mots de passe ne correspondent pas";
        echo "<meta http-equiv='refresh' content='1;url=../client/inscription.php?nom=".$nom."
        &prenom=".$prenom."&age=".$age."&mail=".$mail."&erreur=".$erreur."'/>";
    }
}

function user_exist($mail){
    $bd=getBD();
    $req=$bd->query('SELECT COUNT(*) FROM utilisateur WHERE  mail="'.$mail.'"');
    $count=$req->fetch();
    if($count[0]==0){
        return true;
    }
    else{
        return false;
    }
}

function inscription($nom,$prenom,$tel,$age,$mail,$mdp){
    echo "Enregistrement en cours" . "<br>";

    $bdd = getBD();
    try {
        $req = "INSERT INTO utilisateur(nom,prenom,tel,age,mdp,mail) 
            VALUES('".$nom."','".$prenom."','".$tel."','".$age."','".$mdp."','".$mail."')";
        $bdd->exec($req);
        echo "Inscription validée, redirection en cours";
        echo "<meta http-equiv='refresh' content='0;url=../index/index.php'/>";
    } 
    catch (Exception $e) {
        echo 'Exception reçue : ', $e->getMessage(), "\n";
    }
}
/* ---- Fin inscription ---- */
/* ---- contact ---- */
function envoi_envoi($prenom,$nom,$email,$numero, $message){
    $database1 = getBD();
    $results = $database1 -> query("INSERT INTO contact (prenom,nom,email,numero,message) VALUES('".$prenom."','".$nom ."','".$email."','".$numero."','".$message."')");

}

function envoi2_envoi($prenom,$nom,$email, $message){
    $database1 = getBD();
    $results = $database1 -> query("INSERT INTO contact (prenom,nom,email,message) VALUES('".$prenom."','".$nom ."','".$email."','".$message."')");

}
/* ---- Fin Contact ---- */
/* ---- Commentaire ---- */
function envoiComm($com,$ID,$prenom,$domaine,$nom){// nom -> id de l'établissement/master/ville
    $date=date("Y-m-d H:i:s");
    $date="2019-04-08 12:24:03";
    $bd=getBD();
    try{
    $r='insert into commentaire(comm,'.$domaine.',id_user,prenom,date_com) VALUES("'.addslashes($com).'",'.$nom.','.$ID.',"'.$prenom.'","'.$date.'")';
    $req=$bd -> query($r);
    }
    catch(exception $e){
        echo 'Exception reçue: ', $e ->getMessage(), "\n";
    }
}

function lireComs($domaine,$nom){
    $bd=getBD();
    $req=$bd ->query('SELECT id_user,comm,prenom FROM commentaire where '.$domaine.'="'.$nom.'" ORDER BY id DESC');
    while($com=$req ->fetch()){
        echo '<div class="container">';
            echo '<p class="userMe"> '.$com['prenom'].' :<br></p>';

                echo '<div class="dialogbox">';
                    echo '<div class="bod">';
                        echo '<span class="tip tip-up"></span>';
                            echo '<p class="message">'.$com['comm'].' </p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

    
        
    }
    echo '</div>';
}

/* ---- fin Commentaire ---- */

/* ---- affichage infos ---- */

/* - page région - */

function getListe_sujet($domaine,$reg){
    echo '<form method="POST" action="../recherche/recherche.php?reg='.$reg.'"/>';
    $bd=getBD();
    if($domaine=='master'){
        echo'<h4>Masters:</h4><br>';
        $req1=$bd->query('SELECT code FROM departements WHERE region_code='.$reg);
        echo '<select name="idMaster" id="master">';
        while($region=$req1->fetch()){
            $req2=$bd ->query('SELECT DISTINCT slug FROM villes WHERE department_code='.$region['code']);
            while($ville=$req2->fetch()){
            $req3=$bd->query('SELECT DISTINCT etablissement,Discipline,cle_DISC FROM masters WHERE Academie="'.$ville['slug'].'" ORDER BY discipline ASC');
                while($masters=$req3->fetch()){

                    echo '<OPTION value='.$masters['cle_DISC'].'>';
                    echo $masters['Discipline'].', '.$masters['etablissement'].' Cle discipline: '.$masters['cle_DISC'];
                    echo '</OPTION>';

                }
            }
        }
        echo '</select>';
    }

    if($domaine=='ville'){
        echo'<h4>Villes:</h4><br>';
        echo '<select name="idVille" id="ville">';
            $req2=$bd ->query('SELECT DISTINCT commune FROM etablissements WHERE région_COG='.$reg.' ORDER BY commune ASC');
            while($ville=$req2->fetch()){
                $req3=$bd->query('SELECT id,name FROM `villes` where name="'.$ville['commune'].'" ');
                $result=$req3->fetch();
                echo '<OPTION value='.$result['id'].'>';
                echo $result['name'];
                echo '</OPTION>';
             
            }
        
        echo '</select>';
    }
    if($domaine=='etablissement'){
        echo'<h4>Etablissements:</h4><br>';
        echo '<select name="idEtab" id="etablissement">';
            
            $req2=$bd ->query('SELECT DISTINCT nom,id FROM etablissements WHERE région_COG='.$reg.' ORDER BY nom ASC');
            while($etab=$req2->fetch()){
               
                echo '<OPTION value='.$etab['id'].'>';
                echo $etab['nom'];
                echo '</OPTION>';
            
            }
        
        echo '</select>';
    }
    echo '<input type="hidden" value="SSS"> <br><br>    
    <input type="submit" class="button1" name="Envoyer" value="VA CHERCHER LES INFOS"></form>';
}
/* - fin page région - */

/* - page recherche - */

function getLieu($domaine){
    $bd=getBD();
    if($domaine=="region"){
        echo '<OPTION  value="" > - - - - </OPTION>';
        $req1=$bd ->query('SELECT nom,region_code FROM regions ORDER BY nom ASC');
        while($reg=$req1->fetch()){
            echo '<OPTION  value='.$reg['region_code'].'>';
                echo $reg['nom'];
            echo '</OPTION>';
        }
    }
    if($domaine=="dpt"){
        echo '<OPTION  value="" > - - - - </OPTION>';
        $req1=$bd ->query('SELECT name,code FROM departements ORDER BY name ASC');
        while($dept=$req1->fetch()){
            echo '<OPTION  value='.$dept['code'].'>';
                echo $dept['name'];
            echo '</OPTION>';
        }
    }
}
function getVilles($id,$domaine){
    $bd=getBD();
    if($domaine=='reg'){

        $req=$bd->query('select distinct commune from etablissements where région_COG='.$id.' ORDER BY commune ASC');
        echo 'Selectionnez une ville: <br>';
        echo '<select name="idVille">';
        while($req2=$req->fetch()){
            $req3=$bd->query('SELECT id from villes where name="'.$req2['commune'].'"');
            $id=$req3->fetch();
            echo '<OPTION  value='.$id['id'].'>';
                echo $req2['commune'];
            echo '</OPTION>';
        }
        echo '</select>';  
        echo '<input type=submit name="Envoyer" value=GO /> </form>';
    }
    if($domaine=='dpt'){
        $dpt=$bd->query('SELECT name FROM departements WHERE code='.$id);
        $dep=$dpt->fetch();
        $req=$bd->query('select distinct commune from etablissements where département="'.$dep["name"].'"');
        echo 'Selectionnez une ville: <br>';
        echo '<select name="idVille">';
        while($req2=$req->fetch()){
                $req3=$bd->query('SELECT id from villes where name="'.$req2['commune'].'"');
            $id=$req3->fetch();
            echo '<OPTION  value='.$id['id'].'>';
                echo $req2['commune'];
            echo '</OPTION>';
        }
        echo '</select>';  
        echo '<input type=submit name="Envoyer" value=GO /> </form>';
    }
}

function getEtab($id,$domaine){
    $bd=getBD();
    if($domaine=="reg"){
        $req=$bd->query('SELECT id,nom,commune FROM etablissements WHERE région_COG='.$id);
        $nbr=$req->rowcount();
        if($nbr==0){
            echo "Pas d'établissements dans ce département! </form>";
        }
        else{
            echo 'Selectionnez un établissement: <br>';
            echo '<select name="idEtab">';
            while($etab=$req->fetch()){
                echo '<OPTION  value='.$etab['id'].'>';
                    echo $etab['nom'].', '.$etab['commune'];
                echo '</OPTION>';
            }
            echo '</select>';  
            echo '<input type=submit name="Envoyer" value=GO /> </form>';
        }
    }
    if($domaine=="dpt"){
        $req=$bd->query('SELECT id,nom,commune FROM etablissements WHERE substr(commune_COG,1,2)='.$id); // retrouver villes avec etablissements table masters
        $nbr=$req->rowcount();
        if($nbr==0){
            echo "Pas d'établissements dans ce département! </form>";
        }
        else{
            echo 'Selectionnez un établissement: <br>';
            echo '<select name="idEtab">';
            while($etab=$req->fetch()){
                echo '<OPTION  value='.$etab['id'].'>';
                    echo $etab['nom'].', '.$etab['commune'];
                echo '</OPTION>';
            }
            echo '</select>';  
            echo '<input type=submit name="Envoyer" value=GO /> </form>';
        }
  
    }
}
function getMasters($id,$domaine){
    $bd=getBD();
    if($domaine=="dpt"){
        $liste=[];
        $dpt=$bd->query('SELECT name FROM departements WHERE code='.$id);
        $dep=$dpt->fetch();
        $req=$bd->query('select distinct commune from etablissements where département="'.$dep["name"].'"');
        while($req2=$req->fetch()){
        $mast=$bd->query('SELECT Domaine,Discipline,id FROM masters WHERE etablissement LIKE "%'.$req2['commune'].'%"');
            while($req3=$mast->fetch()){
                $sujet=[$req3['id'],$req3['Discipline'],$req3['Domaine']];
                array_push($liste,$sujet);
            }
        }
        if(empty($liste)){ 
            echo 'Pas de Masters dans ce département!';
        }
        else{
            echo 'Selectionnez un Master: <br> ';
            echo '<select name="idMaster">';
            foreach($liste as $mast){
                echo '<OPTION  value='.$mast[0].'>';
                echo $mast[2].', '.$mast[1];
                echo '</OPTION>';
            }
            echo '</select>';  
            echo '<input type=submit name="Envoyer" value=GO /> </form>';
        }
    }
    if($domaine=="reg"){
        $dpt=$bd->query('SELECT name FROM departements WHERE code='.$id);
        $nbr=$dpt->rowcount();
        if($nbr==0){
            echo "Pas de master dans cette région! </form>";
        }
        else{
            echo 'Selectionnez un Master: <br> ';
            echo '<select name="idMaster">';
            $req=$bd->query('select distinct commune from etablissements where région_COG="'.$id.'"');
            while($req2=$req->fetch()){
            $mast=$bd->query('SELECT Domaine,Discipline,id FROM masters WHERE etablissement LIKE "%'.$req2['commune'].'%"');
                while($req3=$mast->fetch()){
                echo '<OPTION  value='.$req3['id'].'>';
                echo $req3['Domaine'].', '.$req3['Discipline'];
                echo '</OPTION>';
                }
            }
            echo '</select>';  
            echo '<input type=submit name="Envoyer" value=GO /> </form>';
        }
    }
}

function fullMessage(){//simule un envoi de message pour chaque retour possible
    $bd=getBD();
    $a=0;
    $b=0;
    $c=0;
    // pour les communes:
    $req=$bd->query('SELECT DISTINCT commune from etablissements');
    while($ville=$req->fetch()){
        $commune=$bd->query('SELECT id FROM villes WHERE name="'.$ville['commune'].'"');
        $comu=$commune->fetch();
        $com='Génial '.$ville['commune'].' !';
        envoiComm($com,3,'Axel-Bryan','ville',$comu['id']);
        $a++;
    }
    echo 'Ville :'.$a.' ok!';
    //pours les masters:
    $req2=$bd->query('SELECT id,Domaine,Discipline from masters');
    while($master=$req2->fetch()){
        $com='Génial '.$master['Domaine'].' '.$master['Discipline'].' !';
        envoiComm($com,3,'Axel-Bryan','master',$master['id']);
        $b++;
    }
    echo 'Master :'.$b.' ok!';
    //pours les etablissements:
    $req3=$bd->query('SELECT id,nom from etablissements');
    while($etab=$req3->fetch()){
        $com='Génial '.$etab['nom'].' !';
        envoiComm($com,3,'Axel-Bryan','etablissement',$etab['id']);
        $c++;
    }
    echo 'etablissements :'.$c.' ok!';
}

function etab($id){
    $i=0;
    $bd=getBD();
    $req=$bd->query('SELECT * FROM etablissements where id='.$id);
    $etab=$req->fetch();
    if(isset($etab['université'])){
        echo '<p> Université: '.$etab['université'].'</p>';
    }
    echo "<p> Nom : ".$etab['nom']."</p>";
    echo "<p> Type d'établissement : ".$etab['type_détablissement']."</p>";
    echo "<p> Statut : ".$etab['statut']."</p>";
    echo "<p> Adresse : ".$etab['commune_COG']." ".$etab['commune']." , ".$etab['adresse']." ".$etab['cedex']."</p>";
    echo "<p> Téléphone : ".$etab['téléphone']."</p>";
    echo "<p> Académie : ".$etab['académie']."</p>";
    echo "<p> <a href=http://".$etab['onisep']." rel='nofollow' target='_blank'> Rubrique ONISEP </a></p>";
}

function Masters($id){
    $bd=getBD();
    $req=$bd->query('SELECT * FROM Masters where id='.$id);
     $masters=$req->fetch();
     if(isset($masters['Remarque'])){
         echo '<p> Remarque: '.$masters['Remarque'].'</p>';
     }
     echo "<p> Academie:".$masters['Academie']."</p>";
     echo "<p> Domaine: ".$masters['Domaine']."</p>";
     echo "<p> Discipline: ".$masters['Discipline']."</p>";
     echo "<p> Taux_d’insertion:".$masters["Taux_d’insertion"]."</p>";
     echo "<p> emplois_stables:".$masters["_emplois_stables"]."</p>";
     echo "<p> emplois_a_temps_plein:".$masters["_emplois_a_temps_plein"]."</p>";
     echo "<p> emplois_exterieurs_a_la_region_de_l’universite: ".$masters["_emplois_exterieurs_a_la_region_de_l’universite"]."</p>";
     echo "<p> Salaire_net_median_des_emplois_a_temps_plein:".$masters["Salaire_net_median_des_emplois_a_temps_plein"]."</p>";
     echo "<p> Taux_de_reponse:".$masters["Taux_de_reponse"]."</p>";
    }


/* - fin page recherche - */

/* ---- fin infos ---- */
?>