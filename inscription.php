<?php 
//include 'class/inscription.php';
if(isset($_POST['inscription'])) {
	if(!empty($_POST['nomform']) and !empty($_POST['prenomform']) and !empty($_POST['mdpform']) and !empty($_POST['mdpform2']) and $_POST['mdpform'] == $_POST['mdpform2'] and !empty($_POST['emailform'])) {
		include_once 'class/inscription.php';
		$inscription = new inscription($_POST['nomform'], $_POST['prenomform'], $_POST['mdpform'], $_POST['emailform']);
		$search = $inscription->recherche();
			if($search == 0){
				$inscription->inscription();
			}
			else
			{
				$erreur_mail=1;
			}
		}
	else {
	$error = true;
	}
	

}
?>
<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Inscription</title>
    </head>
    <body>
<div id="header">
<a href="index.php"><img src="img/header.jpg" alt="header" style="position:relative;"/></a> 
</div>
    <div id="paragraphe">
<div id="corps"><br>

<?php if(isset($error) and $error == true) echo '<p>Veuillez renseigner toutes les informations et vérifier que les deux mot de passe sont identiques.</p>'; ?>

<h2>Inscription</h2><br />
<fieldset><legend>Inscription</legend>
	<?php
	if(isset($erreur_mail)){
		if($erreur_mail == 1){
			echo'<p>Cette adresse mail à déjà été utilisé !</p>';
		}
	}
	?>
        <form name="form" method="POST">
            <label> Nom : </label><input name="nomform" type="text" /> <br />
	    <label> Prenom : </label><input name="prenomform" type="text" /> <br />
            <label> Mot de passe :</label><input name="mdpform" type="password" /><br />
            <label> Confirmer le mot de passe :</label><input name="mdpform2" type="password" /><br />
            <label> Email :</label><input name="emailform" type="text" /><br />


		<br />
            <input type="submit" name="inscription" value="S'enregistrer" />
     
	</div></fieldset>
        </form></div>
    </body>
</html>
