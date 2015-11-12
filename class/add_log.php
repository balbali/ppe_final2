<?php

include_once 'sql.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of add_reservation
 *
 * @author romain
 */
class add_log extends sql {
    
    private $log;
    
    /**
     * Initialisation des variables
     * @param String $site
     */
    public function __construct($log) {
        parent::__construct();
        $this->log = $log;
    }
    
    /**
     * Créer un logement dans la BDD
     */
    public function req_add() {
        $this->dbh->query('INSERT INTO logement(type_log) VALUES("'.$this->log.'")');
    }
}

?>
