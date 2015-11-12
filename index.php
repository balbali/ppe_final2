<?php 
session_start();
include 'class/authentification.php';
if(isset($_POST['OK'])) {
    $authentification = new authentification($_POST['emailform'], $_POST['mdpform']);
    $authentification->authentification();
}
?>
<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Réservation de séjour</title>
    </head>
    <body>
<div id="header">
<a href="index.php"><img src="img/header.jpg" alt="header" style="position:relative;"/></a> 
</div>
    <div id="paragraphe">
<div id="corps"><br>
<h3>Reservation</h3><br />
<fieldset><legend>Compte</legend>
    <p>Admin</p>
   
    <p>Mail : admin@admin.fr</p>
    <p>Mot de passe : admin</p>
    <p>Utilisateur</p>
    <p>Mail : test@test.fr</
    <p>Mot de passe : test</p>
</fieldset>
<fieldset><legend>Connexion</legend>
<div id="paragraphe">
        <form name="form" method="POST">
            <label> email : </label><input name="emailform" type="text" /> <br />
            <label> Mot de passe</label><input name="mdpform" type="password" /><br />
            <input type="submit" name="OK" value="Connexion" />
<?php
if(isset($_POST['OK'])) {
	echo '<br /> <attention>Identifiant incorecte ou mot de passe incorecte</attention>';
}
if(!empty($_SESSION['user']))
{
	header('Location: panel.php');
}

?>
     <br /><br />
   <a href=inscription.php> S'inscrire</a>
        </form></fieldset>
<?php include 'footer.php';?>