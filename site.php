<?php

include 'class/requiert.php';
$authentification = new requiert();
$authentification->acces();
$authentification->admin();

// Ajout
if(isset($_POST['add'])) {
	if(!empty($_POST['site'])) {
		include_once 'class/add_site.php';
		$add = new add_site(htmlspecialchars($_POST['site']));
		$add->req_add();
		$add_ok = true;
	}
	else {
		$error = true;
	}
}
// Modification
elseif(isset($_POST['up'])) {
	if(!empty($_POST['site']) and !empty($_POST['id']) and is_numeric($_POST['id'])) {
		include_once 'class/update_site.php';
		$up = new update_site($_POST['id'], htmlspecialchars($_POST['site']));
		$up->req_update();
		$up_ok = true;
	}
	else {
		$error = true;
	}
}
// Suppression
elseif(isset($_POST['del'])) {
	if(!empty($_POST['id']) and is_numeric($_POST['id'])) {
		include_once 'class/delete_site.php';
		$del = new delete_site($_POST['id']);
		$del->req_delete();
		$del_ok = true;
	}
	else {
		$error = true;
	}
}

// Obtenir les infos d'un site en fonction de son id
if(!empty($_GET['num']) and is_numeric($_GET['num'])) {
	include_once 'class/info_site.php';
	$info = new info_site($_GET['num']);
	$info->req_data();
	$site = $info->get_data();
}

// Liste de tous les sites
include_once 'class/liste_site.php';
$liste = new liste_site();
$liste->req_data();
$sites = $liste->get_data();

include_once 'header.php'; ?>
 
<?php
if(isset($error)) echo '<p>Veillez à emplir correctement le nom du site.</p>';
if(isset($add_ok)) echo "<p>Un nouveau site a été ajouté. N'oubliez pas d'ajouter des logements pour le site créer</p>";
if(isset($up_ok)) echo '<p>Le site a correctement été modifié.</p>';
if(isset($del_ok)) echo '<p>Le site a correctement été supprimé.</p>';

?>

<fieldset>

	<legend>Modification d'un site</legend>

	<form method="get">
		<select name="num">
			<?php foreach($sites as $elem) {
				echo '<option value="'.$elem['id_site'].'">'.$elem['nom_site'].'</option>';
			} ?>
		</select>
		<input type="submit" value="OK"/>
	</form>

</fieldset>

<form method="post">
	<p><input type="text" name="site" value="<?php if(!empty($site)) echo $site['nom_site']; ?>"/><label>Nom du site</label></p>
	<?php if(empty($site)) { ?>
		<p><input type="submit" name="add" Value="Ajouter un site"/></p>
	<?php } else { ?>
		<p><input type="submit" name="up" Value="Modifier"/>
		<input type="submit" name="del" Value="Supprimer"/></p>
		<input type="hidden" name="id" Value="<?php if(!empty($site)) echo $site['id_site']; elseif(!empty($_POST['id'])) echo $_POST['id']; ?>"/>
		<input type="button" onClick="Javascript:window.document.location.href='site.php';" value="Retour à l'ajout"/>
	<?php } ?>
</form>

<?php include_once 'footer.php';
