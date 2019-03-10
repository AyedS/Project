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
            <div class="con"><a href="#Contact">Contact</a></div>
            <div class="ins"><a href="#Inscription">Inscription</a></div>
            <div class="rec"><a href="#Recherche">Recherche</a></div>
            <div class="acc"><a href="#Accueil">Accueil</a></div>
            <div class="logo"><img src="images/logo1.png"></div>
            <div class="titre">Adopt your job</div>  
        </div>
        
        <div class="contactez-nous">
            <div class="divider"></div>
            <div class="heading">
                    <h2>Contactez-nous</h2>
            </div>
        </div>
        

        
       <div class="container">

            <!-- <div class="divider"></div>
            <div class="heading">
                <h2>Contactez-nous</h2>
            </div> -->
                
           <div class="row">
               <div class="col-lg-10 col-lg-offset-1"> <!-- Affichage responsive du formulaire à l'aide du Grid System (Bootstrap) -->
                    <form id="contact-form" method="post" action="envoi.php">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="prenom">Prénom <span class="blue">*</span></label>
                                <input id="prenom" type="text" name="prenom" class="form-control" placeholder="Votre Prénom" value="<?php if(isset($_GET['prenom'])){echo $_GET['prenom']; } ?>">
                                <p class="comments"><?php if(isset($_GET['prenom'])){ if($_GET['prenom'] == ""){echo "Je connais des prénoms courts mais là tu abuses !";} } ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="nom">Nom <span class="blue">*</span></label>
                                <input id="nom" type="text" name="nom" class="form-control" placeholder="Votre Nom" value="<?php if(isset($_GET['nom'])){echo $_GET['nom']; } ?>">
                                <p class="comments"><?php if(isset($_GET['nom'])){ if($_GET['nom'] == ""){echo "Déclinez votre identité camarade !";} } ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="mail">Email <span class="blue">*</span></label>
                                <input id="mail" type="text" name="mail" class="form-control" placeholder="Votre Email" value="<?php if(isset($_GET['mail'])){echo $_GET['mail']; } ?>">
                                <p class="comments"><?php if(isset($_GET['mail'])){ if($_GET['mail'] == ""){echo "Et je fais comment pour te répondre moi ?";} } ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="num">Téléphone</label>
                                <input id="num" type="tel" name="num" class="form-control" placeholder="Votre Téléphone" value="<?php if(isset($_GET['num'])){echo $_GET['num']; }else{echo "";} ?>">
                                <p class="comments"></p>
                            </div>
                            <div class="col-md-12">
                                <label for="message">Message <span class="blue">*</span></label>
                                <textarea id="message" name="message" class="form-control" placeholder="Votre Message" rows="4"><?php if(isset($_GET['message'])){echo $_GET['message']; } ?></textarea>
                                <p class="comments"><?php if(isset($_GET['message'])){ if($_GET['message'] == ""){echo "C'est un peu trop silencieux là non ?";} } ?></p>
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