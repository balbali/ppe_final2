<?php

include_once 'sql.php';
/**
 * Savoir si un utilisateur a payé sa reservation
 */
class info_paye extends sql {
    
    private $id;
	private $result;
    
    /**
     * Initialiser $id
     * @param int $id
     */
    function __construct($id) {
        parent::__construct();
        $this->id = $id;
    }
    
    /**
     * Requête pour savoir si un user a payé sa reservation
     */
    public function req_result() {
        $req = $this->dbh->query('SELECT paye_reservation FROM reservation WHERE id_reservation = '.$this->id.' LIMIT 1') or die(print_r($this->dbh->errorInfo()));
        $this->result = $req->fetch();
	$this->result = $this->result['paye_reservation'];
    }

    /**
     * Renvoie un booléen pour dire si la reservation a déjà été payé
     * @return boolean $result
     */
    public function get_result() {
        return $this->result;
    }
}

?>
