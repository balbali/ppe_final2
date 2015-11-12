<?php

include 'class/requiert.php';
$authentification = new requiert();
$authentification->acces();
$authentification->admin();

if(!empty($_POST['OK']))
{
if(empty($_POST['date'])) {
	$error = true;
}
else {
	include_once('class/liste_semaine.php');
	$semaines = new liste_semaine($_SESSION['zone_vacs']);
	$semaines->req_data();
	$data = $semaines->get_data();
	$requete_vacs = false;

	foreach($data as $elem) {
		if($elem['num_semaine'] == $_POST['date']) {
			include 'class/delete_vacs.php';
			$vacs_delete = new vacs_delete($_POST['date'], $_SESSION['zone_vacs']);
    		$vacs_delete->vacs_delete();
			$requete_vacs = true;
			$delete = true;
		}
	}

	if($requete_vacs == false){
		include 'class/add_vacs.php';
		$vacs_add = new add_vacs($_POST['date'], $_SESSION['zone_vacs']);
    	$vacs_add->add_vacs();
    	$add = true;
	}
	
}
}

include_once 'header.php';

if(isset($add) and $add == true) echo '<p>Semaine ajoutée.</p>';
elseif(isset($delete) and $delete == true) echo '<p>Semaine supprimée.</p>';


include_once 'calendrier.php'; 
$calendrier = new calendrier();
$calendrier->zone();
$calendrier->get_calendrier();

if(isset($error) and $error == true) echo '<p>Veuillez sélectionner une semaine dans le calendrier.</p>';

if(!empty($_SESSION['zone_vacs'])) { ?>
<form method="POST">
	<input readonly type='text' id='date' name='date'>
	<input type="submit" value="OK" name="OK"/></p>
</form>
<?php }

include_once 'footer.php'; ?>
