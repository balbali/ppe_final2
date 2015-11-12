<?php
include 'class/requiert.php';
$authentification = new requiert();
$authentification->acces();
?>
<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Panel</title>
    </head>
    <body> 

<?php include 'menu.php'; ?>
<h2>Panel</h2>
<?php
 if (!empty($_SESSION['user']))
{
    echo "Bienvenue " . $_SESSION['user']." ". $_SESSION['prenom'].",<br>";
    echo "Vous êtes inscrit depuis le " .$_SESSION['date_user']."<br>";
    echo "Votre adresse email est : " .$_SESSION['email']."<br>";
}
else
{
    echo 'Connexion refusée';
   
}
     
?>
	<br><br>
    </body>
</html>
