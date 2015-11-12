<?php

include_once 'class/sql.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Nombre de réservation selon une semaine, un site et un logement donnés
 *
 * @author romain
 */
class nb_reserv extends sql {

    private $semaine;
    private $site;
    private $log;
    
    function __construct($semaine, $site, $log) {
        parent::__construct();
        $this->semaine = $semaine;
        $this->site = $site;
        $this->log = $log;
    }
    
    /**
     * Requête pour obtenir le nombre de reservation
     */
    public function req_data() {
	$req = $this->dbh->query('
            SELECT COUNT(*) AS nb FROM reservation
            WHERE semaine_reservation = '.$this->semaine.'
            AND site_reservation = '.$this->site.'
            AND log_reservation = '.$this->log.'
            ') or die(print_r($this->dbh->errorInfo()));
        $this->data = $req->fetch();
    }
    
    /**
     * Retourne le tableau des logements
     * @return array
     */
    public function get_data() {
        return $this->data['nb'];
    }
}

?>
