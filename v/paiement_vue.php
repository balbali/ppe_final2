<?php include_once 'header.php'; 

echo '<p>Vous avez actuellement ' . $this->argent . '€ sur votre compte.</p>
<p>Cette reservation vous coutera '.$this->cout.'€.</p>
<form method="POST">
	<input type="submit" name="payer" value="Payer"/>
</form>
' ;
if ($this->erreur_paiement == true) {
	echo "<div id='argent_erreur'>";
	echo "Et bah tu sais pas lire ?<br>";
	echo "Il te reste $this->argent  € sur ton compte<br />";
	echo "<a href='argent.php'>Clique ici pour recharger ton compte</a></div>";
}
?>

<?php include_once 'footer.php'; ?>
