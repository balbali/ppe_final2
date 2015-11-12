<?php

include_once 'sql.php';

/**
 * Obtenir la dernière reservation d'un utilisateur
 *
 * @author romain
 */
class last_reservation extends sql {
    
    private $id;
    private $reserv;
    
    /**
     * Initialiser $id
     * @param int $id
     */
    function __construct($id) {
        parent::__construct();
        $this->id = $id;
    }
	
    /**
     * Requête connaitre la dernière reservation d'un user
     */
    public function req_reserv() {
        $req = $this->dbh->query('SELECT id_reservation FROM reservation WHERE user_reservation = '.$this->id.' ORDER BY date_reservation DESC LIMIT 1') or die(print_r($this->dbh->errorInfo()));
        $this->reserv = $req->fetch();
	$this->reserv = $this->reserv['id_reservation'];
    }

    /**
     * Retourne l'id d'une reservation
     * @return int
     */
    public function get_reserv() {
	return $this->reserv;
    }
}

?>
