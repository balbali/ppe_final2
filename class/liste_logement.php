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
class liste_logement extends sql {

    private $data;
    private $id;
    
    function __construct($id) {
        parent::__construct();
        $this->id = $id;
    }
    
    /**
     * Requête pour obtenir la liste des logements selon un id_site
     */
    public function req_data() {
        $this->data = $this->dbh->query('
            SELECT * FROM logement 
            INNER JOIN site_logement ON logement.id_log = site_logement.id_log
            WHERE id_site = '.$this->id.'
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
