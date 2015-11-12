<?php

include_once 'class/requiert.php';
$authentification = new requiert();
$authentification->acces();
$authentification->admin();

if(isset($_POST['add'])) {
	if(!empty($_POST['id']) and is_numeric($_POST['id'])) {
		include_once 'class/update_droits.php';
		$up = new update_droits($_POST['id']);
		$up->req_add();
		$add = true;
	}
	else {
		$error = true;
	}
}
elseif(isset($_POST['remove'])) {
	if(!empty($_POST['id']) and is_numeric($_POST['id'])) {
		include_once 'class/update_droits.php';
		$up = new update_droits($_POST['id']);
		$up->req_remove();
		$remove = true;
	}
	else {
		$error = true;
	}
}

if(isset($_POST['recherche'])) {
	include_once 'class/liste_user.php';
	$liste = new liste_user(htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['email']));
	$liste->req_data();
	$data = $liste->get_data();
}

include_once 'header.php'; ?>

<p>Modifier les droits des utilisateurs en renseignant un ou plusieurs des troits champs suivants :</p>

<form method="POST">
	<label>Prénom :</label> <input type="text" name="prenom"/><br>
	<label>Nom</label><input type="text" name="nom"/><br>
	<label>Email</label><input type="text" name="email"/><br>
	<input type="submit" name="recherche" value="OK"/>
</form>

<?php 

if(!empty($data)) {
	echo '<table>';
		echo '
			<tr>
				<td>Id de l\'utilisateur</td>
				<td>Prénom</td>
				<td>Nom</td>
				<td>Email</td>
				<td>Privilèges administrateur</td>
			</tr>
		';
		foreach ($data as $elem) {
			echo '
				<tr>
					<td>'.$elem['id_user'].'</td>
					<td>'.$elem['prenom_user'].'</td>
					<td>'.$elem['nom_user'].'</td>
					<td>'.$elem['email_user'].'</td>
                                        <td>'.$elem['rang_user'].'</td>
			';
			if($elem['rang_user'] == 0) {
				echo '<td>Membre</td>';
			}
			else {
				echo '<td>Administrateur</td>';
			}
			echo '<td><input type="radio" name="user" value="'.$elem['id_user'].'" onClick="option_droits('.$elem['rang_user'].', '.$elem['id_user'].')"/></td>';
			echo '</tr>';
		}
	echo '</table>';
}
elseif(isset($_POST['recherche'])) {
	echo '<p>Aucun utilisateur n\'a été trouvé.</p>';
} ?>

<?php
if(isset($add) and $add == true) echo '<p>Les droits ont bien été ajoutés pour cet utilisateur.</p>';
if(isset($remove) and $remove == true) echo '<p>Les droits ont bien été supprimés pour cet utilisteur.</p>';
if(isset($error) and $error == true) echo '<p>Une erreur est survenue.</p>';
?>

<form method="POST" name="form">
	<input type="submit" name="add" value="Donner les droits administrateurs" style="display: none;"/>
	<input type="submit" name="remove" value="Retirer les droits administrateurs" style="display: none;"/>
	<input type="hidden" name="id"/>
</form>

<script type="text/javascript">
	function option_droits(rang, id) {
		if(rang == 1) {
			form.remove.style.display = "block";
		}
		else {
			form.add.style.display = "block";
		}
		form.id.value = id;
	}
</script>


<?php include_once 'footer.php';
