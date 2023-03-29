<?php
 	include("connexion.php");
	if (isset($_POST['envoie_f'])) {
		extract($_POST);
        var_dump($_POST);
		if ( !empty($mdp_f) && !empty($mail_f)) {
         
					$requet = $bdd->prepare("select * from user");
					$requet->execute();
                    while($resul = $requet->fetch()){
                        if($resul["mdp"]==$mdp_f and $resul["mail"]==$mail_f){ 
                               header("location:Acceuil.php");
                    else{
                          echo"vous n'avez pas de compte";
                               } 
		}
	}
}
	else{
        echo"requette non envoyer";
	}	


 ?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/index.css">
    <link rel="stylesheet" href="./css/all.css">
</head>
<body>
    <div class="capsule">
        <div class="connecter">
            <h2 class="log">Login</h2>
            <div class="for2">
                <form action="" method="post">
                    <input class="champs2" type="email" placeholder="ADRESSE E-MAIL" name="mail_f"> <br>
                    <input class="champs2" type="password" placeholder="MOT DE PASSE" name="mdp_f"> <br>
                    <input class="champs2" type="submit" value="SE CONNESTER" name="envoie_f"> <br>
                    <a href="index.php">s'inscrire</a>

                </form>
            </div>
            
        </div>
    </div>
</body>
</html>