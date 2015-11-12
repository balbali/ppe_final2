<?php

include 'class/requiert.php';
$authentification = new requiert();
$authentification->acces();
$authentification->admin();

// Valider les reservations
if(isset($_POST['valider']) and !empty($_POST['valide'])) {
	include_once 'class/update_reserv.php';
	foreach($_POST['valide'] as $key => $elem) {
		$update = new update_reserv($key);
		$update->req_valide();
		include_once 'class/info_reserv.php';
		$info = new info_reserv($key);
		$info->req_data();
		$id_sl = $info->get_data();
	}
}
// Supprimer les reservations
elseif(isset($_POST['annuler']) and !empty($_POST['valide'])) {
	include_once 'class/update_reserv.php';
	foreach($_POST['valide'] as $key => $elem) {
		$update = new update_reserv($key);
		$update->req_delete();
	}
}

include_once 'class/liste_reserv.php';
$liste = new liste_reserv();
$liste->req_data();
$liste->req_data_valide();
$reserv = $liste->get_data();
$valide = $liste->get_valide();

include_once 'header.php';

?>
	
	<?php
	if(empty($reserv)) {
		echo '<p>Aucune réservation à valider ou à supprimer.</p>';
	}
	else {?>
	
		<p>Validez les dernières réservations commandées ou annulez les pour les supprimer.</p>
	
		<form method="post">
			<table>
				<tr>
					<td>Id de la réservation</td>
					<td>Prénom et nom</td>
					<td>Site</td>
					<td>Type de logement</td>
					<td>Pension</td>
					<td>Menage</td>
					<td>Reglement</td>
					<td></td>
				</tr>
				<?php foreach($reserv as $elem) { ?>
				<tr>
					<td><?php echo $elem['id_reservation']; ?></td>
					<td><?php echo $elem['prenom_user'] . ' ' . $elem['nom_user']; ?></td>
					<td><?php echo $elem['nom_site']; ?></td>
					<td><?php echo $elem['type_log']; ?></td>
					<td>
						<?php if($elem['pension_reservation'] == 1) echo 'Oui';
						else echo 'Non'; ?>
					</td>
					<td>
						<?php if($elem['menage_reservation'] == 1) echo 'Oui';
						else echo 'Non'; ?>
					</td>
					<td>
						<?php if($elem['paye_reservation'] == 1) echo 'Payé';
						else echo 'Non payé'; ?>
					</td>
					<td><input type="checkbox" name="valide[<?php echo $elem['id_reservation']; ?>]"/></td>
				</tr>
				<?php } ?>
			</table>
			<input type="submit" name="valider" value="Valider"/>
			<input type="submit" name="annuler" value="Annuler"/>
		</form>
		
		<p>Dernières réservations validées: </p>
		
		<table>
			<tr>
				<td>Id de la réservation</td>
				<td>Prénom et nom</td>
				<td>Site</td>
				<td>Type de logement</td>
				<td>Pension</td>
				<td>Menage</td>
				<td>Reglement</td>
			</tr>
			<?php foreach($valide as $elem) { ?>
			<tr>
				<td><?php echo $elem['id_reservation']; ?></td>
				<td><?php echo $elem['prenom_user'] . ' ' . $elem['nom_user']; ?></td>
				<td><?php echo $elem['nom_site']; ?></td>
				<td><?php echo $elem['type_log']; ?></td>
				<td>
					<?php if($elem['pension_reservation'] == 1) echo 'Oui';
					else echo 'Non'; ?>
				</td>
				<td>
					<?php if($elem['menage_reservation'] == 1) echo 'Oui';
					else echo 'Non'; ?>
				</td>
				<td>
						<?php if($elem['paye_reservation'] == 1) echo 'Payé';
						else echo 'Non payé'; ?>
					</td>
			</tr>
			<?php } ?>
		</table>
		
	<?php }
include_once 'footer.php'; ?>
