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
class add_site extends sql {
    
    private $site;
    
    /**
     * Initialisation des variables
     * @param String $site
     */
    public function __construct($site) {
        parent::__construct();
        $this->site = $site;
    }
    
    /**
     * Créer un site dans la BDD
     */
    public function req_add() {
        $this->dbh->query('INSERT INTO site(nom_site) VALUES("'.$this->site.'")');
    }
}

?>
