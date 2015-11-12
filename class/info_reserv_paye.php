<?php

include_once 'sql.php';

/**
 * Savoir si la reservation a été faite sous un user donné
 *
 * @author romain
 */
class info_reserv_paye extends sql {
    
    private $reserv;
    private $user;
    private $result;
    
    /**
     * Initialiser les variables
     * @param int $reserv
     * @param int $user
     */
    function __construct($reserv, $user) {
        parent::__construct();
	$this->reserv = $reserv;
        $this->user = $user;
    }
    
    /**
     * Requête pour savoir si la reservation appartient bien à l'utilisateur
     */
    public function req_result() {
        $req = $this->dbh->query('SELECT COUNT(*) as nb FROM reservation WHERE id_reservation = '.$this->reserv.' AND user_reservation = '.$this->user.'') or die(print_r($this->dbh->errorInfo()));
        $this->result = $req->fetch();
	$this->result = $this->result['nb'];
    }
    
    /**
     * Renvoie un booléen
     * @return boolean $result
     */
    public function get_result() {
        return $this->result;
    }
}

?>
