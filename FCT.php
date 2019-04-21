<?php
function getBD(){
    $bdd=new PDO('mysql:host=127.0.0.1;dbname=adopt_your_job;charset=utf8','root','root');
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
function envoiComm($com,$ID,$prenom,$domaine,$nom){
    $date=date("Y-m-d H:i:s");
    $date="2019-04-08 12:24:03";
    $bd=getBD();
    try{
    $r='insert into commentaire(comm,'.$domaine.',id_user,prenom,date_com) VALUES("'.addslashes($com).'","'.$nom.'",'.$ID.',"'.$prenom.'","'.$date.'")';
    $r='insert into commentaire(comm,'.$domaine.',id_user,prenom,date_com) VALUES("'.addslashes($com).'","'.$nom.'",'.$ID.',"'.$prenom.'","'.$date.'")';

    //$r='select * from commentaire';
    //$r='INSERT INTO commentaire(comm,ville,id_user,prenom,) VALUES("hg","montpellier",3,"Axel-Bryan","2019-04-08 12:24:03")';
    echo $r;
    //$r="INSERT INTO commentaire(comm,".$domaine.",id_user,prenom,date) VALUES('".addslashes($com)."','".$nom."',".$ID.",'".$prenom."','".$date."')";
    $req=$bd -> query($r);
    //$t = $req->fetch();
    echo  $req;
    //$req=$bd -> query("INSERT INTO commentaire(comm,".$domaine.",id_user,prenom,date) VALUES('".addslashes($com)."','".$nom."',".$ID.",'".$prenom."','".$date."')");
    //return $req;
    /*
    if($domaine=='master'){
        $req=$bd->prepare('INSERT INTO commentaire(comm,master,id_user,prenom,date) VALUES(:com,:nom,:id,:prenom,:date)');
    }
    if($domaine=='ville'){
        $req=$bd->prepare('INSERT INTO commentaire(comm,ville,id_user,prenom,date) VALUES(:com,:nom,:id,:prenom,:date)');
    }
    if($domaine=='etablissement'){
        $req=$bd->prepare('INSERT INTO commentaire(comm,etablissement,id_user,prenom,date) VALUES(:com,:nom,:id,:prenom,:date)');
    }

    $req=$bd->prepare('INSERT INTO commentaire(comm,'.$domaine.',id_user,prenom,date) VALUES(:com,:nom,:id,:prenom,:date)');

    $req->execute(array(
        'com'=>addslashes($com),
        'nom'=>$nom,
        'id'=>$ID,
        'prenom'=>$prenom,
        'date'=>$date
    ));*/
    }
    catch(exception $e){
        echo 'Exception reçue: ', $e ->getMessage(), "\n";
    }
}

function lireComs($domaine,$nom){
    $bd=getBD();
    $req=$bd ->query('SELECT id_user,comm,prenom FROM commentaire where '.$domaine.'="'.$nom.'" ORDER BY date ASC');
    while($com=$req ->fetch()){
        echo '<div class="container">';
        if(isset($_SESSION['client'])){
            if($com['id_user']==$_SESSION['client']['ID']){
                echo '<div class="row">';
                    echo '<div class="col-lg-9">';
                        echo '<p class="comMe">'.$com['comm'].' </p>';
                    echo '</div>';
                    echo '<div class="col-lg-3">';
                        echo '<p class="userMe">: '.$com['prenom'].'<br></p>';
                    echo '</div>';
                echo'</div>';

            }
        }
        else{
            echo '<div class="row">';
                echo '<div class="col-lg-9">';
                    echo '<p class="comMe">'.$com['comm'].' </p>';
                echo '</div>';
                echo '<div class="col-lg-3">';
                    echo '<p class="userMe">: '.$com['prenom'].'<br></p>';
                echo '</div>';
            echo'</div>';

        }
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
        echo '<select name="master" id="master">';
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
        echo '<select name="ville" id="ville">';
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
        echo '<select name="etablissement" id="etablissement">';

            $req2=$bd ->query('SELECT DISTINCT nom,id FROM etablissements WHERE région_COG='.$reg.' ORDER BY nom ASC');
            while($etab=$req2->fetch()){

                echo '<OPTION value='.$etab['id'].'>';
                echo $etab['nom'];
                echo '</OPTION>';

            }

        echo '</select>';
    }
    echo '<input type="hidden" value="SSS">
    <input type="submit" value="VA CHERCHER LES INFOS"></form>';
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

        while($req2=$req->fetch()){
            $req3=$bd->query('SELECT id from villes where name="'.$req2['commune'].'"');
            $id=$req3->fetch();
            echo '<OPTION  value='.$id['id'].'>';
                echo $req2['commune'];
            echo '</OPTION>';

        }
    }
    if($domaine=='dpt'){
        $dpt=$bd->query('SELECT name FROM departements WHERE code='.$id);
        $dep=$dpt->fetch();
        $req=$bd->query('select distinct commune from etablissements where département="'.$dep["name"].'"');
        while($req2=$req->fetch()){
            $req3=$bd->query('SELECT id from villes where name="'.$req2['commune'].'"');
            $id=$req3->fetch();
            echo '<OPTION  value='.$id['id'].'>';
                echo $req2['commune'];
            echo '</OPTION>';

        }
    }
}

function getEtab($id,$domaine){
    $bd=getBD();
    if($domaine=='reg'){
        $req=$bd->query('select nom, université, id from etablissements where région_COG='.$id.'order by nom ASC');
        while($req2=$req->fetch()){
            echo '<OPTION  value='.$req2['id'].'>';
                echo $req2['nom'].$req2['université'];
            echo '</OPTION>';
        }
    }
    if($domaine=='dpt'){
        $dpt=$bd->query('select distinct nom, université, etablissements.id FROM etablissements, departements
          WHERE etablissements.région_COG='.$id.'
          and'.$id.'=departements.region_code');
        while($dep=$dpt->fetch()){
            echo '<OPTION  value='.$dep['id'].'>';
                echo $dep['université'].$dep['nom'];
            echo '</OPTION>';
        }
    }
}

function getMasters($id,$domaine){
// fait par axel
}

  function getInfosVille($id){
      if($domaine="villes"){
        $bd=getBD();
        $req=$bd->query('select distinct name from villes where id='.$id.'');
        $a=$req->fetch();
        $req2=$bd->query('select department_code from villes where id='.$id.'');
        $b=$req2->fetch();
        $req3=$bd->query('select code from departements where code='.$b['department_code'].'');
        $c=$req3->fetch();
        $req4=$bd->query('select region_code from departements where code='.$c['code'].'');
        $d=$req4->fetch();
        $req5=$bd->query('select region_code from regions where region_code='.$d['region_code'].'');

        echo '<h1> '.$a['name'].' </h1>';

        echo '<div>';
        echo '<h3> Loyers </h3>';
        $req6=$bd->query('select moyenne_loyer_mensuel, surface_moyenne, nombre_logements from loyers where agglomeration like "%'.$a['name'].'%"');
        echo '<p> Prix des loyers: </p>';
        while($loyer=$req6->fetch()){
          echo $loyer['moyenne_loyer_mensuel'];
          echo '</br>';
          echo $loyer['surface_moyenne'];
          echo '</br>';
          echo $loyer['nombre_logements'];
          echo '</br>';
        }
        echo '</div>';

        echo '<div>';
        echo '<h3> Masters </h3>';
        $req7=$bd->query('select diplome, etablissement, domaine from masters where etablissement like "%'.$a['name'].'%"');
        echo '<p> Masters présents dans la ville: </p>';
        while($masters=$req7->fetch()){
          echo '</br>';
          echo $masters['diplome'];
          echo '</br>';
          echo $masters['etablissement'];
          echo '</br>';
          echo $masters['domaine'];
          echo '</br>';
        }
        echo '</div>';

        echo '<div>';
        echo '<h3> Cinémas </h3>';
        $req8=$bd->query('select NOM_ETABLISSEMENT from cinemas where COMMUNE="'.$a['name'].'"');
        echo '<p> Nom des cinémas : </p>';
        while($cine=$req8->fetch()){
            echo $cine['NOM_ETABLISSEMENT'];
            echo '</br>';
        }
        echo '</div>';

        echo '<div>';
        echo '<h3> Musées </h3>';
        $req9=$bd->query('select NOM_DU_MUSEE, ADR, TELEPHONE1, SITWEB from musees where VILLE="'.$a['name'].'"');
        echo '</br> <p> Musées de la ville: </p>';
        while($musees=$req9->fetch()){
          echo $musees['NOM_DU_MUSEE'];
          echo '</br>';
          echo $musees['ADR'];
          echo '</br>';
          echo $musees['TELEPHONE1'];
          echo '</br>';
          echo $musees['SITWEB'];
          echo '</br>';
        }
        echo '</div>';

        echo '<div>';
        echo '<h3> Passagers </h3>';
        $req10=$bd->query('select Nombre_moyen_de_trajets_quotidiens_en_2017, Nombre_de_passagers_en_2017_en_milliers, Nature_de_la_liaison from nb_passagers where Liaisons like "%'.$a['name'].'%"');
        echo '<p> Nombre de passagers dans la ville : </p>';
        while($nbpassager=$req10->fetch()){
          echo $nbpassager['Nombre_moyen_de_trajets_quotidiens_en_2017'];
          echo '</br>';
          echo $nbpassager['Nombre_de_passagers_en_2017_en_milliers'];
          echo '</br>';
          echo $nbpassager['Nature_de_la_liaison'];
          echo '</br>';
        }
        echo '</div>';

        echo '<div>';
        echo '<h3> Liaisons </h3>';
        $req11=$bd->query('select Nom_de_la_liaison, Type_de_concurrence_SLO_et_ from liaison where Nom_de_la_liaison like "%'.$a['name'].'%"');
        echo '<p> Type de concurrence entre régions : </p>';
        while($liaison=$req11->fetch()){
          echo $liaison['Nom_de_la_liaison'];
          echo '</br>';
          echo $liaison['Type_de_concurrence_SLO_et_'];
          echo '</br>';
        }
        echo '</div>';
    }
}
/* - fin page recherche - */

/* ---- fin infos ---- */
?>
