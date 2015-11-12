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
class info_reserv extends sql {
    
    private $id;
    private $data;
    private $cout;
    
    /**
     * Initialiser $id
     * @param int $id
     */
    function __construct($id) {
        parent::__construct();
        $this->id = $id;
    }
    
    /**
     * Requête pour savoir l'id site et log d'une reservation
     */
    public function req_data() {
        $req = $this->dbh->query('SELECT site_reservation, log_reservation FROM reservation WHERE id_reservation = '.$this->id.' LIMIT 1') or die(print_r($this->dbh->errorInfo()));
        $this->data = $req->fetch();
    }

	/**
	 * Requête pour extraire le cout d'une reservation
	 */
	public function req_cout() {
		$req = $this->dbh->query('SELECT site_reservation, log_reservation FROM reservation WHERE id_reservation = '.$this->id.' LIMIT 1');
		$data = $req->fetch();
		$req = $this->dbh->query('SELECT cout_sl FROM site_logement WHERE id_site = '.$data['site_reservation'].' AND id_log = '.$data['log_reservation'].' LIMIT 1') or die(print_r($this->dbh->errorInfo()));
		$this->cout = $req->fetch();
		$this->cout = $this->cout['cout_sl'];
	}
    
    /**
     * Renvoie un l'id log et l'id site
     * @return array $data
     */
    public function get_data() {
        return $this->data;
    }

    /**
     * Renvoie le cout d'un logement en fonction du site
     * @return double $cout
     */
    public function get_cout() {
        return $this->cout;
    }
}

?>
