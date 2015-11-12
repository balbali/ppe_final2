<?php

include_once 'class/sql.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Obtenir la liste des logements
 *
 * @author romain
 */
class liste_reserv extends sql {

    private $data;
	private $valide;
    
    /**
     * Requête pour obtenir la liste des reservations en attente
     */
    public function req_data() {
        $this->data = $this->dbh->query('
		SELECT * FROM reservation 
		INNER JOIN user ON user.id_user = reservation.user_reservation
		INNER JOIN site ON site.id_site = reservation.site_reservation
		INNER JOIN logement ON logement.id_log = reservation.log_reservation
		WHERE valide_reservation = 0
		ORDER BY date_reservation DESC
		')->fetchAll();
    }
	
    /**
     * Requête pour obtenir la liste des reservations validés
     */
    public function req_data_valide() {
        $this->valide = $this->dbh->query('
		SELECT * FROM reservation 
		INNER JOIN user ON user.id_user = reservation.user_reservation
		INNER JOIN site ON site.id_site = reservation.site_reservation
		INNER JOIN logement ON logement.id_log = reservation.log_reservation
		WHERE valide_reservation = 1
		ORDER BY date_reservation DESC
		')->fetchAll();
    }
    
    /**
     * Retourne le tableau des reservations en attente
     * @return array
     */
    public function get_data() {
        return $this->data;
    }
	
    /**
     * Retourne le tableau des reservations validés
     * @return array
     */
    public function get_valide() {
        return $this->valide;
    }
}

?>
