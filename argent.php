<?php 
include 'class/requiert.php';
include 'c/argent_ctrl.php';
$authentification = new requiert();
$authentification->acces();
$argent = new argent_ctrl();
$argent->form();
$argent->argent();
$argent->vue();
    
?>

