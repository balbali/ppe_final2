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
class info_sl extends sql {
    
	private $id_site;
    private $id_log;
	private $result;
	private $data;
    
    /**
     * Initialiser les variables
     * @param int $id_site
	 * @param int $id_log
     */
    function __construct($id_site, $id_log) {
        parent::__construct();
        $this->id_site = $id_site;
        $this->id_log = $id_log;
    }
	
    /**
     * Requête pour avoir les infos d'un logement en fonction d'un site
     */
    public function req_data() {
        $req = $this->dbh->query('SELECT * FROM site_logement WHERE id_site = '.$this->id_site.' AND id_log = '.$this->id_log.'') or die(print_r($this->dbh->errorInfo()));
        $this->data = $req->fetch();
    }
	
    /**
     * Requête pour avoir les infos d'un logement en fonction d'un site
     */
    public function req_nb() {
        $req = $this->dbh->query('SELECT nb_log_sl FROM site_logement WHERE id_site = '.$this->id_site.' AND id_log = '.$this->id_log.'') or die(print_r($this->dbh->errorInfo()));
        $this->data = $req->fetch();
    }
    
    /**
     * Requête pour savoir si un site logement existe en fonction du site
     */
    public function req_exist() {
        $req = $this->dbh->query('SELECT id_site FROM site_logement WHERE id_site = '.$this->id_site.' AND id_log = '.$this->id_log.'') or die(print_r($this->dbh->errorInfo()));
        $this->result = $req->rowCount();
    }
    
    /**
     * Renvoie un booléen pour savoir si le site logement existe
     * @return boolean $result
     */
    public function get_result() {
        return $this->result;
    }
	
    /**
     * Renvoie les infos d'un logement en fonction d'un site
     * @return array $data
     */
    public function get_data() {
        return $this->data;
    }
}

?>
