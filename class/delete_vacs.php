<?php

include_once 'class/sql.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 *
 * @author christian
 */
class vacs_delete extends sql {
    
	private $id;
	private $zone;
	
	/**
	 * Initialisation des variables
	 * @param int $date
	 */
	function __construct($id, $zone) {
	    parent::__construct();
		$this->id = $id;
		$this->zone = $zone;
	}
	
	/**
	 * Requête pour supprimer une semaine de vacances
	 */
	public function vacs_delete() {
		$this->dbh->query('DELETE FROM semaine WHERE num_semaine = '.$this->id.' AND zone_semaine = '.$this->zone.'');

	}
}

?>
