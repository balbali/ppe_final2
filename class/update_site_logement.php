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
class update_site_logement extends sql {
    
	private $id_site;
	private $id_log;
	
	/**
	 * Initialisation des variables
	 * @param int $id_site
	 * @param int $id_log
	 */
	function __construct($id_site, $id_log) {
	    parent::__construct();
		$this->id_site = $id_site;
		$this->id_log = $id_log;
	}
	
	/**
	 * Requête pour incrémenter
	 */
	public function req_increment() {
		$this->dbh->query('UPDATE site_logement SET util_sl = util_sl + 1 WHERE id_site = '.$this->id_site.' AND id_log = '.$this->id_log.'') or die(print_r($this->dbh->errorInfo()));
	}
}

?>
