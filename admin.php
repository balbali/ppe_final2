<?php
include 'class/requiert.php';
$authentification = new requiert();
$authentification->acces();
$authentification->admin();
?>
<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Administration</title>
    </head>
    <body> 

<?php include 'menu.php'; ?>
<br>
<h2>Administration</h2> 
		  
		<a class="boutonadmin" href="validation.php">Gèrer les revervations</a><br>
		<a class="boutonadmin" href="site.php">Gèrer les sites</a><br>
		<a class="boutonadmin" href="logement.php">Gèrer les logements</a><br>
		<a class="boutonadmin" href="semaine.php">Gèrer les vacances</a> <br>
		<a class="boutonadmin" href="droits.php">Gèrer les droits des utilisateurs</a><br>

	

	<br><br></div></div>
    </body>
</html>
