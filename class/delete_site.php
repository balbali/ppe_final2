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
class delete_site extends sql {
    
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
	 * Requête pour supprimer un site
	 */
	public function req_delete() {
		$this->dbh->query('DELETE FROM site WHERE id_site = '.$this->id.'');
		$this->dbh->query('DELETE FROM site_logement WHERE id_site = '.$this->id.'');
	}
}

?>