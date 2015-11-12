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
class info_site extends sql {
    
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
     * Requête pour avoir les infos d'un site
     */
    public function req_data() {
        $req = $this->dbh->query('SELECT * FROM site WHERE id_site = '.$this->id.'') or die(print_r($this->dbh->errorInfo()));
        $this->data = $req->fetch();
    }
    
    /**
     * Requête pour savoir si un site existe selon son id
     */
    public function req_exist() {
        $req = $this->dbh->query('SELECT id_site FROM site WHERE id_site = '.$this->id.'') or die(print_r($this->dbh->errorInfo()));
        $this->result = $req->rowCount();
    }
    
    /**
     * Renvoie un booléen pour savoir si le site existe
     * @return boolean $result
     */
    public function get_result() {
        return $this->result;
    }
	
    /**
     * Renvoie les infos d'un site
     * @return array $data
     */
    public function get_data() {
        return $this->data;
    }
}

?>
