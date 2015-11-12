<?php
include 'class/requiert.php';
$authentification = new requiert();
$authentification->acces();

include_once 'c/paiement_ctrl.php';
$paiement = new paiement_ctrl();
$paiement->infos_reserv();
$paiement->verif();
$paiement->deja_payee();
$paiement->payer();
$paiement->vue();