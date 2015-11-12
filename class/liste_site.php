<?php

include_once 'class/sql.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Obtenir des infos concernant les sites
 *
 * @author romain
 */
class liste_site extends sql {
    
    private $data;
    
    /**
     * Requête pôur obtenir la liste des sites
     */
    public function req_data() {
        $this->data = $this->dbh->query('SELECT * FROM site')->fetchAll();
    }
    
    /**
     * Retourne un tableau de sites
     * @return array
     */
    public function get_data() {
        return $this->data;
    }
}

?>
