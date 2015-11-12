<?php

include_once 'sql.php';

/**
 * Savoir si la reservation a été faite sous un user donné
 *
 * @author romain
 */
class info_argent extends sql {
    
    private $user;
    private $argent;
    
    /**
     * Initialiser les variables
     * @param int $reserv
     * @param int $user
     */
    function __construct($user) {
        parent::__construct();
        $this->user = $user;
    }
    
    /**
     * Requête pour connaitre l'argent d'un client
     */
    public function req_argent() {
	$req = $this->dbh->query('SELECT argent_user FROM user WHERE id_user = '.$this->user.'');
	$this->argent = $req->fetch();
	$this->argent = $this->argent['argent_user'];
    }
    
    /**
     * Renvoie l'argent d'un user
     * @return double $int
     */
    public function get_argent() {
        return $this->argent;
    }
}

?>
