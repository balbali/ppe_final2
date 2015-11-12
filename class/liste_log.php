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
class liste_log extends sql {

    private $data; 
	
    /**
     * Requête pour obtenir la liste des logements
     */
    public function req_data() {
        $this->data = $this->dbh->query('
            SELECT * FROM logement 
            ')->fetchAll();
    }
    
    /**
     * Retourne le tableau des logements
     * @return array
     */
    public function get_data() {
        return $this->data;
    }
}

?>
