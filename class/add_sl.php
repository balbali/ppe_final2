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
class add_sl extends sql {
    
    private $id_site;
    private $id_log;
    
    /**
     * Initialisation des variables
     * @param int $id_site
	 * @param int $id_log
     */
    public function __construct($id_site, $id_log) {
        parent::__construct();
        $this->id_site = $id_site;
        $this->id_log = $id_log;
    }
    
    /**
     * Créer un site logement dans la BDD
     */
    public function req_add() {
        $this->dbh->query('INSERT INTO site_logement(id_site, id_log) VALUES('.$this->id_site.', '.$this->id_log.')');
    }
}

?>
