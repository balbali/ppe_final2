<?php 
include 'class/requiert.php';
$authentification = new requiert();
$authentification->acces();

if(isset($_POST['up'])) {
	if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['email'])) {
		$_SESSION['user'] = htmlspecialchars($_POST['nom']);
		$_SESSION['prenom'] = htmlspecialchars($_POST['prenom']);
		$_SESSION['email'] = htmlspecialchars($_POST['email']);
		include_once 'class/update_user.php';
		$up = new update_user($_SESSION['id'], $_SESSION['user'], $_SESSION['prenom'], $_SESSION['email']);
		$up->req_update();
		$modif = true;
	}
}

include_once 'class/infos_user.php';
$infos = new infos_user($_SESSION['id']);
$infos->req_data();
$infos = $infos->get_data();

include_once 'header.php';

?>
 
<h2>Profil</h2><br />
	<?php echo "<p>Bienvenue " . $_SESSION['user']." ". $_SESSION['prenom'].",</p><br>";?>

<?php if(isset($modif) and $modif == true) echo '<p>Vos modifications ont été prises en compte.</p>'; ?>

<fieldset>
	<legend>Infos utilisateur</legend>
	<?php 
	if($infos['rang_user'] == 1) {
		echo '<p>Vous êtes un administrateur.</p>';
	}
	?>
	<form method="POST">
		<p><label>Votre nom</label><input type="text" name="nom" value="<?php echo $infos['nom_user']; ?>"/></p>
		<p><label>Votre prénom</label><input type="text" name="prenom" value="<?php echo $infos['prenom_user']; ?>"/></p>
		<p><label>Votre adresse email</label><input type="text" name="email" value="<?php echo $infos['email_user']; ?>"/></p>
		<p><input type="submit" name="up" value="Modifier"/></p>
	</form>
</fieldset>
<br><br>
<fieldset>
	<legend>Infos bancaire</legend>
<?php
	echo "Vous avez actuellement ".$infos['argent_user']."€ sur votre compte.";
?><br>
<input type="button" value="Ajouter de l'argent"onclick="location.href='argent.php';"> 
</fieldset>
<br><br>
<fieldset><legend>changer de mot de passe</legend>

<form name="form" method="POST">
            <label> Mot de passe actuel : </label><input name="mdp" type="password" /> <br />
            <label> Nouveau Mot de passe</label><input name="newmdp" type="password" /><br />
	    <label> Retapez le nouveau Mot de passe</label><input name="newmdp1" type="password" /><br />
            <input type="submit" name="change" value="Validez !" />
		
     
   
        </form><br><br><?php
if(isset($_POST['change']))
{

	if($_SESSION['mdp'] == $_POST['mdp'])
	{
		if($_POST['newmdp'] == $_POST['newmdp1'])
		{
			include 'class/changemdp.php';
			$changemdp = new changemdp($_SESSION['user'], $_POST['newmdp']);
			$changemdp->changemdp();
			echo 'mot de passe changé';
		}
		else
		{
			echo 'Les deux nouveaux mot de passe correspond pas.';
		}
	}
	else
	{
		echo 'Le mot de passe actuelle correspond pas.';
	}
}

include_once 'footer.php';
    
?>
