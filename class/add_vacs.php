<?php

include_once 'sql.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of add_reservation
 *
 * @author christian
 */
class add_vacs extends sql {
    
    private $num;
    private $zone;
    
    /**
     * Initialisation des variables
     * @param String $id
     */
    public function __construct($num, $zone) {
        parent::__construct();
        $this->num = $num;
	$this -> zone = $zone;
    }
    
    /**
     * Requête pour ajouter une semaine de vacances
    */
    public function add_vacs() {
        
	 $this->dbh->query('INSERT INTO semaine(num_semaine, zone_semaine) VALUES ("'.$this->num.'","'.$this->zone.'")');
    }
}

?>
