<?php

include 'class/requiert.php';
$authentification = new requiert();
$authentification->acces();
$authentification->admin();

include_once 'class/info_sl.php';

// Ajout
if(isset($_POST['add'])) {
		if(!empty($_POST['log'])) {
			include_once 'class/add_log.php';
			$add = new add_log(htmlspecialchars($_POST['log']));
			$add->req_add();
			$add_ok = true;
		}
		else {
			$error = true;
		}
}
// Modification
elseif(isset($_POST['up'])) {
	if(!empty($_POST['log']) and !empty($_POST['id']) and is_numeric($_POST['id'])) {
		include_once 'class/update_log.php';
		$up = new update_log($_POST['id'], htmlspecialchars($_POST['log']));
		$up->req_update();
		$up_ok = true;
		if(
		!empty($_GET['site']) and is_numeric($_GET['site'])
		and	isset($_POST['nb_log']) and is_numeric($_POST['nb_log'])
		and isset($_POST['entree']) 
		and isset($_POST['piece']) and is_numeric($_POST['piece']) 
		and isset($_POST['lit']) and is_numeric($_POST['lit']) 
		and isset($_POST['wc']) 
		and isset($_POST['balcon']) 
		and isset($_POST['cloison'])  
		and isset($_POST['douche'])
		and isset($_POST['prix']) and is_numeric($_POST['prix']) 
		) {
			$info = new info_sl($_GET['site'], $_POST['id']);
			$info->req_exist();
			// Ajouter un site logement s'il n'existe pas encore
			if($info->get_result() != 1) {
				include_once 'class/add_sl.php';
				$add = new add_sl($_GET['site'], $_GET['num']);
				$add->req_add();
			}
			include_once 'class/update_sl.php';
			$up = new update_sl($_GET['site'], $_GET['num'], $_POST['nb_log'], $_POST['entree'], $_POST['piece'], $_POST['lit'], $_POST['wc'], $_POST['balcon'], $_POST['cloison'], $_POST['douche'],$_POST['prix']);
			$up->req_update();
		}
		else {
			$error_infos = true;
		}
	}
	else {
		$error = true;
	}
}
// Suppression
elseif(isset($_POST['del'])) {
	if(!empty($_POST['id']) and is_numeric($_POST['id'])) {
		include_once 'class/delete_log.php';
		$del = new delete_log($_POST['id']);
		$del->req_delete();
		$del_ok = true;
	}
	else {
		$error = true;
	}
}

// Infos sur un logement en fonction d'un site
if(!empty($_GET['num']) and is_numeric($_GET['num']) and !empty($_GET['site']) and is_numeric($_GET['site'])) {
	$info = new info_sl($_GET['site'], $_GET['num']);
	$info->req_data();
	$sl = $info->get_data();
}

// Obtenir les infos d'un logement en fonction de son id
if(!empty($_GET['num']) and is_numeric($_GET['num'])) {
	include_once 'class/info_logement.php';
	$info = new info_logement($_GET['num']);
	$info->req_data();
	$log = $info->get_data();
}

// Liste de tous les logements
include_once 'class/liste_log.php';
$liste = new liste_log();
$liste->req_data();
$logs = $liste->get_data();

// Liste de tous les sites
include_once 'class/liste_site.php';
$liste = new liste_site();
$liste->req_data();
$sites = $liste->get_data();

include_once 'header.php'; 

if(isset($error)) echo '<p>Veillez à emplir correctement le nom du logement.</p>';
if(isset($add_ok)) echo '<p>Un nouveau logement a été ajouté.</p>';
if(isset($up_ok) and empty($error_infos)) echo '<p>Le logement a correctement été modifié.</p>';
elseif(isset($up_ok)) echo '<p>Le nom du logement a correctement été modifié.</p>';
if(isset($del_ok)) echo '<p>Le logement a correctement été supprimé.</p>';
if(isset($error_infos) and !empty($_GET['site'])) echo '<p>Cependant, les informations concernant le logement n\'ont pas été modifiées. Veillez à remplir tous les champs avant de valider.</p>';

?>

<form method="get">
	<p><select name="num">
		<?php foreach($logs as $elem) {
			echo '<option value="'.$elem['id_log'].'"';
			if(!empty($_GET['num']) and $_GET['num'] == $elem['id_log']) echo 'selected';
			echo '>'.$elem['type_log'].'</option>';;
		} ?>
	</select>
	<p><select name="site">
		<option></option>
		<?php foreach($sites as $elem) {
			echo '<option value="'.$elem['id_site'].'"';
			if(!empty($_GET['site']) and $_GET['site'] == $elem['id_site']) echo 'selected';
			echo '>'.$elem['nom_site'].'</option>';
		} ?>
	</select><label>Sélectionner le site pour modifier toutes les caractéristiques (facultatif)</label></p>
	<p><input type="submit" value="OK"/></p>
</form>

<form method="post">
	<p><input type="text" name="log" value="<?php if(!empty($log))	echo $log['type_log']; ?>"/><label>Nom du logement</label></p>
	<?php if(!empty($_GET['num']) and is_numeric($_GET['num']) and !empty($_GET['site']) and is_numeric($_GET['site'])) { ?>
		<p><input type="text" name="nb_log" value="<?php if(!empty($sl)) echo $sl['nb_log_sl']; ?>"/><label>Nombre de logements</label></p>
		<p>
			Entrée
			<input type="radio" name="entree" value="1" <?php if(!empty($sl) and $sl['entree_sl'] == 1) echo 'checked="checked"'; ?>/><label>Oui</label>
			<input type="radio" name="entree" value="0" <?php if(!empty($sl) and $sl['entree_sl'] == 0) echo 'checked="checked"'; ?>/><label>Non</label>
		</p>
		<p><input type="text" name="piece" value="<?php if(!empty($sl)) echo $sl['nb_piece_sl']; ?>"/><label>Nombre de pièces</label></p>
		<p><input type="text" name="lit" value="<?php if(!empty($sl)) echo $sl['nb_lit_sl']; ?>"/><label>Nombre de lits</label></p>
		<p>
			WC
			<input type="radio" name="wc" value="1" <?php if(!empty($sl) and $sl['wc_sl'] == 1) echo 'checked="checked"'; ?>/><label>Oui</label>
			<input type="radio" name="wc" value="0" <?php if(!empty($sl) and $sl['wc_sl'] == 0) echo 'checked="checked"'; ?>/><label>Non</label>
		</p>
		<p>
			Balcon
			<input type="radio" name="balcon" value="1" <?php if(!empty($sl) and $sl['balcon_sl'] == 1) echo 'checked="checked"'; ?>/><label>Oui</label>
			<input type="radio" name="balcon" value="0" <?php if(!empty($sl) and $sl['balcon_sl'] == 0) echo 'checked="checked"'; ?>/><label>Non</label>
		</p>
		<p>
			Cloison
			<input type="radio" name="cloison" value="1" <?php if(!empty($sl) and $sl['cloison_sl'] == 1) echo 'checked="checked"'; ?>/><label>Oui</label>
			<input type="radio" name="cloison" value="0" <?php if(!empty($sl) and $sl['cloison_sl'] == 0) echo 'checked="checked"'; ?>/><label>Non</label>
		</p>
		<p>
			Douche
			<input type="radio" name="douche" value="1" <?php if(!empty($sl) and $sl['douche_sl'] == 1) echo 'checked="checked"'; ?>/><label>Oui</label>
			<input type="radio" name="douche" value="0" <?php if(!empty($sl) and $sl['douche_sl'] == 0) echo 'checked="checked"'; ?>/><label>Non</label>
		</p>
		<p>
			<input type="text" name="prix" value="<?php if(!empty($sl)) echo $sl['cout_sl']; ?>"/><label>Prix</label>
		</p>
	<?php }
	if(empty($log)) { ?>
		<p><input type="submit" name="add" Value="Ajouter"/></p>
	<?php } else { ?>
		<p><input type="submit" name="up" Value="Modifier"/>
		<input type="submit" name="del" Value="Supprimer"/></p>
		<input type="hidden" name="id" Value="<?php if(!empty($log)) echo $log['id_log']; elseif(!empty($_POST['id'])) echo $_POST['id']; ?>"/>
		<input type="button" onClick="Javascript:window.document.location.href='logement.php';" value="Retour à l'ajout"/>
	<?php } ?>
</form>

<?php
include_once 'footer.php';
