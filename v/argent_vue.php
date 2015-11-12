<?php include_once 'header.php'; 
echo 'Vous avez actuellement ' . $this->argent . '€ sur votre compte.';
?>
	<form method="POST">
		<p><label>Montant Argent </label><input type="text" name="argent" value=""/></p>
		<p><input type="submit" name="submit" value="Ajouter"/></p>
	</form>
<br><br>
<?php
if ($this->erreurajout == true) {
	echo "<div id='argent_erreur'>";
	echo "T'es un rigolo toi<br>";
	echo "L'ajout doit être superieur à zero :)";
	echo "</div>";
}
?>
           
<?php include_once 'footer.php'; ?>



 
