<?php

include_once 'sql.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of info_site
 *
 * @author romain
 */
class info_logement extends sql {
    
    private $id;
    private $result;
	private $data;
    
    /**
     * Initialiser $id
     * @param int $id
     */
    function __construct($id) {
        parent::__construct();
        $this->id = $id;
    }
	
    /**
     * Requête pour savoir si un logement existe selon son id
     */
    public function req_data() {
        $req = $this->dbh->query('SELECT * FROM logement WHERE id_log = '.$this->id.'');
        $this->data = $req->fetch();
    }
    
    /**
     * Requête pour savoir si un logement existe selon son id
     */
    public function req_exist() {
        $req = $this->dbh->query('SELECT id_log FROM logement WHERE id_log = '.$this->id.'');
        $this->result = $req->rowCount();
    }
	
    /**
     * Renvoie un tableau d'infos concernant un logement
     * @return array $data
     */
    public function get_data() {
        return $this->data;
    }
    
    /**
     * Renvoie un booléen pour savoir si le logement existe
     * @return boolean
     */
    public function get_result() {
        return $this->result;
    }
}

?>
