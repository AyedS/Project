<!DOCTYPE html>
<html>
    <head>
        <title>Contactez-nous !</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/script.js"></script>
    </head>
    
    
    <body>
        
        
        <div class="topnav">
            <div class="conn"><a href="#Connexion">Connexion</a></div>
            <div class="con"><a href="contact.php">Contact</a></div>
            <div class="ins"><a href="#Inscription">Inscription</a></div>
            <div class="rec"><a href="#Recherche">Recherche</a></div>
            <div class="acc"><a href="#accueil">Accueil</a></div>
            <div class="logo"><img src="images/logo1.png"></div>
            <div class="titre">Adopt your job</div>  
        </div>
        
        <div class="inscrivez-vous">
            <div class="divider"></div>
            <div class="heading">
                    <h2>Inscrivez-vous</h2>
            </div>
        </div>
        
      <div class="container">

                
           <div class="row">
               <div class="col-lg-10 col-lg-offset-1"> <!-- Affichage responsive du formulaire à l'aide du Grid System (Bootstrap) -->
                    <form id="contact-form" method="post" action="enregistrement.php" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="prenom">Prénom <span class="blue">*</span></label>
                                <input id="prenom" type="text" name="prenom" class="form-control" placeholder="Votre Prénom" value="<?php if(isset($_GET['prenom'])){echo $_GET['prenom']; } ?>">
                                <p class="comments"><?php if(isset($_GET['prenom'])){ if($_GET['prenom'] == ""){echo "Je m'attendais à plus de lettres !";} } ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="nom">Nom <span class="blue">*</span></label>
                                <input id="nom" type="text" name="nom" class="form-control" placeholder="Votre Nom" value="<?php if(isset($_GET['nom'])){echo $_GET['nom']; } ?>">
                                <p class="comments"><?php if(isset($_GET['nom'])){ if($_GET['nom'] == ""){echo "404 name not found :)";} } ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="mail">Email <span class="blue">*</span></label>
                                <input id="mail" type="text" name="mail" class="form-control" placeholder="Votre Email" value="<?php if(isset($_GET['mail'])){echo $_GET['mail']; } ?>">
                                <p class="comments"><?php if(isset($_GET['mail'])){ if($_GET['mail'] == ""){echo "Ton email est entre de bonnes mains !";} } ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="num">Numéro</label>
                                <input id="num" type="tel" name="num" class="form-control" placeholder="Votre Numéro" value="<?php if(isset($_GET['num'])){echo $_GET['num']; } ?>">
                                <p class="comments"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="mdp1">Mot de passe<span class="blue">*</span></label>
                                <input id="mdp1" type="password" name="mdp1" class="form-control" placeholder="Mot de passe" value="">
                                <p class="comments"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="mdp2">Confirmez votre mot de passe<span class="blue">*</span></label>
                                <input id="mdp2" type="password" name="mdp2" class="form-control" placeholder="Mot de passe" value="">
                                <p class="comments"></p>
                            </div>
                            <div class="col-md-12">
                                <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="button1" value="Envoyer">
                            </div>    
                        </div>
                    </form>
                </div>
           </div>
        </div>
        
    </body>

</html>