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
class update_log extends sql {
    
	private $id;
	private $log;
	
	/**
	 * Initialisation des variables
	 * @param int $id
	 * @param String $log
	 */
	function __construct($id, $log) {
	    parent::__construct();
		$this->id = $id;
		$this->log = $log;
	}
	
	/**
	 * Requête pour modifier un site
	 */
	public function req_update() {
		$this->dbh->query('UPDATE logement SET type_log = "'.$this->log.'" WHERE id_log = '.$this->id.'') or die(print_r($this->dbh->errorInfo()));
	}
}

?>
