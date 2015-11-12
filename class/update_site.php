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
class update_site extends sql {
    
	private $id;
	private $site;
	
	/**
	 * Initialisation des variables
	 * @param int $id
	 * @param String $site
	 */
	function __construct($id, $site) {
	    parent::__construct();
		$this->id = $id;
		$this->site = $site;
	}
	
	/**
	 * Requête pour modifier un site
	 */
	public function req_update() {
		$this->dbh->query('UPDATE site SET nom_site = "'.$this->site.'" WHERE id_site = '.$this->id.'') or die(print_r($this->dbh->errorInfo()));
	}
}

?>
