<?php
 	include("connexion.php");
	if (isset($_POST['envoie_f'])) {
		extract($_POST);
        
		
		if (!empty($nom_f) && !empty($mdp_f) && !empty($confirm_mdp_f) && !empty($mail_f)) {

			if ($mdp_f==$confirm_mdp_f) {
                echo"Bien";
					$requette = $bdd->prepare("INSERT INTO user(nom,mdp,mail)  VALUES (:nom,:mdp,:mail)");
					$requette->execute([
					'nom'=>$nom_f,
					'mdp'=>$mdp_f,
					'mail'=>$mail_f
					]);
				}	
		}

       
	}
	else{
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
    <div class="container">
        <div class="gauche">
            <h1 class="titre">L'ENERGIE <br> ET LA FRAICHEUR</h1>
            <h2 >La liste des utilisateurs</h2>
            <div class="tableau">
            <table>
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>E-mail</th>
                </tr>
                </thead>
                <?php
                 $requette2 = $bdd->prepare("SELECT * FROM user");
                 $requette2->execute();
                    while($result = $requette2->fetch()){

                    
                
                ?>
                <tbody>
                <tr>
                    <td> <?php echo $result["nom"];  ?> </td>
                    <td> <?php echo $result["mail"];  ?> </td>
                </tr>
                </tbody>
                <?php
                    }
                    ?>
                    <tfoot>
                        <tr>
                            <td colspan=6>
                                
                            </td>
                        </tr>
                    </tfoot>
            </table>
            </div>
        </div>
        <div class="droite">
            <div class="formulaire">
                <div id="forme">
                <form action="" method="post">
                    <p>
                        <input class="champ" type="text" placeholder="NOM D'UTILISATEUR" name="nom_f">
                    </p>
                    <p>
                        <input class="champ"  type="password" placeholder="MOT DE PASSE" name="mdp_f">
                    </p>
                    <p>
                    <input class="champ" type="password" placeholder="MOT DE PASSE" name="confirm_mdp_f">
                    </p>
                    <p>
                    <input class="champ" type="email" placeholder="ADRESSE E-MAIL" name="mail_f">
                    </p>
                    <p>
                        <div id="connexion">
                        <input type="submit" value="S'INSCRIRE" name="envoie_f" id="btn_f">
                    </p>
                    <a class="lien" href="connecter.php">SE CONNECTER</a>
                        </div>
                    
                </form>

                <div class="icon">
                <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-youtube"></i>
                    <i class="fas fa-tel"></i>
                </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>