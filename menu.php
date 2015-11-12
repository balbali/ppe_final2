<div id="header">
<a href="index.php"><img src="img/header.jpg" alt="header" style="position:relative;"/></a> 
</div>
<ul class="menu">  
        <li><a href="index.php">Accueil</a></li>
	<li><a href="interface.php">Mes réservations</a></li>
	<li><a href="profil.php">Profil</a>
 
        </li>
	<?php
	if (!empty($_SESSION['rang']) and $_SESSION['rang'] == 1)
	{
	echo '<li><a href="admin.php">Administration</a></li>  ';
	}
	?>
	
	<li><a href="deconnexion.php">Deconnexion</a></li>  
    </ul> <br>
    <div id="paragraphe">
<div id="corps"><br>
