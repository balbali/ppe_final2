<?php
include 'class/requiert.php';
$authentification = new requiert();
$authentification->acces();

include_once 'class/liste_reserv_user.php';
$liste = new liste_reserv_user($_SESSION['id']);
$liste->req_data_valide();
$liste->req_data_invalide();
$valide = $liste->get_data_valide();
$invalide = $liste->get_data_invalide();

include_once 'header.php';

?>

<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/interface.js"></script>

<a class="boutonadmin" href="reservation.php">Faire une revervation</a><a class="boutonadmin" href="argent.php">Ajouter de l'argent sur le compte</a><br><br>
		<?php if(empty($valide)) {
			echo 'Aucune réservation validée';
		}
		else { ?><br>
			<p>Vos réservation validée
			<input type="button" value="+" id="valide"/></p>
			<table style="display: none" id="table_valide">
				<tr>
					<td>Id de la réservation</td>
					<td>Site</td>
					<td>Type de logement</td>
					<td>Pension</td>
					<td>Menage</td>
					<td>Reglement</td>
				</tr>
				<?php foreach($valide as $elem) { ?>
				<tr>
					<td><?php echo $elem['id_reservation']; ?></td>
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
						<?php if($elem['paye_reservation'] == 1) echo 'Oui';
						else echo 'Non'; ?>
					</td>
				</tr>
				<?php } ?>
			</table>
		<?php } ?>
		
		<?php if(empty($invalide)) {
			echo '<p>Aucune réservation en attente.</p>';
		}
		else { ?>
			<p>Réservation en attente
			<input type="button" value="+" id="reserv"/></p>
			</p>
			<table style="display: none" id="table_reserv">
				<tr>
					<td>Id de la réservation</td>
					<td>Site</td>
					<td>Type de logement</td>
					<td>Pension</td>
					<td>Menage</td>
					<td>Reglement</td>
				</tr>
				<?php foreach($invalide as $elem) { ?>
				<tr>
					<td><?php echo $elem['id_reservation']; ?></td>
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
						else echo '<a href="paiement.php?id='.$elem['id_reservation'].'">Non payé</a>'; ?>
					</td>
				</tr>
				<?php } ?>
			</table><br><br>
		<?php } 
		
include_once 'footer.php'; ?>
