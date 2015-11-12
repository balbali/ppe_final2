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
class liste_reserv_user extends sql {

    private $data_valide;
	private $data_invalide;
	private $id;
	
	function __construct($id) {
        parent::__construct();
		$this->id = $id;
	}
    
    /**
     * Requ�te pour obtenir la liste des reservations selon l'id d'un user
	 * et si la reservation a �t� valid�
     */
    public function req_data_valide() {
        $this->data_valide = $this->dbh->query('
		SELECT * FROM reservation 
		INNER JOIN user ON user.id_user = reservation.user_reservation
		INNER JOIN site ON site.id_site = reservation.site_reservation
		INNER JOIN logement ON logement.id_log = reservation.log_reservation
		WHERE valide_reservation = 1
		AND id_user = '.$this->id.'
		ORDER BY date_reservation DESC
		')->fetchAll();
    }
	
    /**
     * Requ�te pour obtenir la liste des reservations selon l'id d'un user
	 * et si la reservation n'a pas �t� valid�e
     */
    public function req_data_invalide() {
        $this->data_invalide = $this->dbh->query('
		SELECT * FROM reservation 
		INNER JOIN user ON user.id_user = reservation.user_reservation
		INNER JOIN site ON site.id_site = reservation.site_reservation
		INNER JOIN logement ON logement.id_log = reservation.log_reservation
		WHERE valide_reservation = 0
		AND id_user = '.$this->id.'
		ORDER BY date_reservation DESC
		')->fetchAll();
    }
    
    /**
     * Retourne le tableau des reservations
     * @return array
     */
    public function get_data_valide() {
        return $this->data_valide;
    }
	
    /**
     * Retourne le tableau des reservations
     * @return array
     */
    public function get_data_invalide() {
        return $this->data_invalide;
    }
}

?>
