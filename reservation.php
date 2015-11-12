<?php
include 'class/requiert.php';
$authentification = new requiert();
$authentification->acces();

if(isset($_POST['submit'])) {
    if(!empty($_GET['site']) and is_numeric($_GET['site']) and !empty($_POST['log']) and is_numeric($_POST['log']) and !empty($_POST['date'])) {
        include_once 'class/info_site.php';
        $info = new info_site($_GET['site']);
        $info->req_exist();
        if($info->get_result() == 1) {
			include_once 'class/info_sl.php';
			$nb_sl = new info_sl($_GET['site'], $_POST['log']);
			$nb_sl->req_nb();
			$max = $nb_sl->get_data();
			include_once 'class/nb_reserv.php';
			$reserv = new nb_reserv($_POST['date'], $_GET['site'], $_POST['log']);
			$reserv->req_data();
			if($reserv->get_data() < $max['nb_log_sl'])  {
				include_once 'class/info_logement.php';
				$info = new info_logement($_POST['log']);
				$info->req_exist();
				if($info->get_result() == 1) {
					// Insérer dans la base de données
					include_once 'class/add_reservation.php';
					if(!empty($_POST['pension'])) {
						$pension = 1;
					}
					else {
						$pension = 0;
					}
					if(!empty($_POST['menage'])) {
						$menage = 1;
					}
					else {
						$menage = 0;
					}
					$add = new add_reservation($_POST['date'], $_SESSION['id'] , $_GET['site'], $_POST['log'], $pension, $menage);
					$add->req_add();
					// obtenir l'id de la dernière reservation
					include_once 'class/last_reservation.php';
					$last = new last_reservation($_SESSION['id']);
					$last->req_reserv();
					$last = $last->get_reserv();
					header('Location: paiement.php?id='.$last.'');
				}
				else {
					$error = true;
				}
			}
			else {
				$complet = true;
			}
        }
        else {
          $error = true;
        }
    }
    else {
        $error_info = true;
    }
}

include_once 'class/liste_site.php';
$liste = new liste_site();
$liste->req_data();
$site = $liste->get_data();
        
if(!empty($_GET['site']) and is_numeric($_GET['site'])) {
    include_once 'class/liste_logement.php';
    $liste = new liste_logement($_GET['site']);
    $liste->req_data();
    $logement = $liste->get_data();
}

/*
include_once 'class/nb_reserv.php';
foreach($site as $elem) {
	foreach($logement as $elem2) {
		$reserv = new nb_reserv(9, $elem['id_site'], $elem2['id_log']);
		$reserv->req_data();
		$nb_reserv[$elem['id_site']][$elem2['id_log']] = $reserv->get_data();
	}
}*/

include_once 'header.php';

?>
        
		<?php if(isset($error)) echo '<p>Une erreur est survenue.</p>'; ?>
		<?php if(isset($complet)) echo '<p>Malheureusement le logement est complet. Veuillez choisir une autre date ou un autre logement.</p>'; ?>
		<?php if(isset($error_info)) echo '<p>Merci de reseigner tous les champs.</p>';
		
		include_once 'calendrier.php'; 
		$calendrier = new calendrier();
		$calendrier->zone(); 
		
		if(!empty($_SESSION['zone_vacs'])) {	?>
		
       		<table>
	            <tr>
	                <?php foreach($site as $elem) {
	                    echo '<td>'.$elem['nom_site'].'</td>';
	                }?>
	            </tr>
	            <tr>
	                <?php foreach($site as $elem) {
	                    echo '<td><input type="radio" name="site" onclick="self.location.href=\'reservation.php?site='.$elem['id_site'].'\'"';
	                    if(!empty($_GET['site']) and $_GET['site'] == $elem['id_site']) {
	                        echo 'checked';
	                    }
	                    echo '/></td>';
	                }?>
	            </tr>
	        </table>
			<br>
	        <?php 
    	}
		
		if(!empty($logement)) {

		$calendrier->get_calendrier(); ?>	
        
        <form method="post">
		
            <p>Numéro de semaine : <input readonly type="text" name="date" id="date"/><label><br />A remplir en cliquant sur une zone verte du calendrier</label></p>
          
             	
			<table>
				<tr>
					<td></td>
					<?php foreach($logement as $elem) {
						echo '<td>'.$elem['type_log'].'</td>';
					}?>
				</tr>
				<tr>
					<td>Nombre de logements</td>
					<?php foreach($logement as $elem) {
						echo '<td>' . $elem['nb_log_sl'] . '</td>';
					}?>
				</tr>
				<tr>
					<td>Entrée</td>
					<?php foreach($logement as $elem) {
						echo '<td>';
						if($elem['entree_sl'] == 1) {
							echo 'Oui';
						}
						else {
							echo 'Non';
						}
						echo '</td>';
					}?>
				</tr>
				<tr>
					<td>Nombre de pièces</td>
					<?php foreach($logement as $elem) {
						echo '<td>'.$elem['nb_piece_sl'].'</td>';
					}?>
				</tr>
				<tr>
					<td>Nombre de lits</td>
					<?php foreach($logement as $elem) {
						echo '<td>'.$elem['nb_lit_sl'].'</td>';
					}?>
				</tr>
				<tr>
					<td>WC</td>
					<?php foreach($logement as $elem) {
						echo '<td>';
						if($elem['wc_sl'] == 1) {
							echo 'Oui';
						}
						else {
							echo 'Non';
						}
						echo '</td>';
					}?>
				</tr>
				<tr>
					<td>Balcon</td>
					<?php foreach($logement as $elem) {
						echo '<td>';
						if($elem['balcon_sl'] == 1) {
							echo 'Oui';
						}
						else {
							echo 'Non';
						}
						echo '</td>';
					}?>
				</tr>
				<tr>
					<td>Cloison</td>
					<?php foreach($logement as $elem) {
						echo '<td>';
						if($elem['cloison_sl'] == 1) {
							echo 'Oui';
						}
						else {
							echo 'Non';
						}
						echo '</td>';
					}?>
				</tr>
				<tr>
					<td>Douche</td>
					<?php foreach($logement as $elem) {
						echo '<td>';
						if($elem['douche_sl'] == 1) {
							echo 'Oui';
						}
						else {
							echo 'Non';
						}
						echo '</td>';
					}?>
				</tr>
				<tr>
					<td>Prix</td>
					<?php foreach($logement as $elem) {
						echo '<td>';
						
							echo $elem['cout_sl'].' €';
						
						echo '</td>';
					}?>
				</tr>
				<tr>
					<td>Choix</td>
					<?php foreach($logement as $elem) {
						echo '<td><input type="radio" name="log" value="'.$elem['id_log'].'"/></td>';
					}?>
				</tr>
			</table>
        
            <p><input type="checkbox" name="pension"/>Pension complète<label></label></p>
            <p><input type="checkbox" name="menage"/><label>Option fin de séjour</label></p>
            <p><input type="submit" name="submit" value="Commander"/></p>
        </form>
		
		<?php } ?>

<?php include_once 'footer.php'; ?>
