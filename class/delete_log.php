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
class delete_log extends sql {
    
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
	 * Requête pour supprimer un logement
	 */
	public function req_delete() {
		$this->dbh->query('DELETE FROM logement WHERE id_log = '.$this->id.'');
		$this->dbh->query('DELETE FROM site_logement WHERE id_log = '.$this->id.'');
	}
}

?>