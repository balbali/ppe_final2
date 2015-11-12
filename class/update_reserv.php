<?php

include_once 'class/sql.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 *
 * @author romain
 */
class update_reserv extends sql {
    
	private $id;
	
	/**
	 * Initialisation des variables
	 * @param int $id
	 */
	function __construct($id) {
	    parent::__construct();
		$this->id = $id;
	}
	
	/**
	 * Requête pour valider une reservation
	 */
	public function req_valide() {
		$this->dbh->query('UPDATE reservation SET valide_reservation = 1 WHERE id_reservation = '.$this->id.'') or die(print_r($this->dbh->errorInfo()));
	}
	
	/**
	 * Requête pour supprimer une reservation
	 */
	public function req_delete() {
		$this->dbh->query('DELETE FROM reservation WHERE id_reservation = '.$this->id.'');
	}
}

?>
