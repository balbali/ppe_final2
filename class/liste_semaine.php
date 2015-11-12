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
class liste_semaine extends sql {

    private $data;
	private $zone;
    
	/**
	 * Mise en place de la variable $zone
	 */
	function __construct($zone) {
        parent::__construct();
        $this->zone = $zone;
    }
	
    /**
     * Requête pour obtenir la liste des semaines
     */
    public function req_data() {
        $this->data = $this->dbh->query('SELECT * FROM semaine WHERE zone_semaine = '.$this->zone.'')->fetchAll();
    }
    
    /**
     * Retourne le tableau des semaines
     * @return array
     */
    public function get_data() {
        return $this->data;
    }
}

?>
