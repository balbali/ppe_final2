<?php

include_once 'sql.php';
/**
 * Dire à la BDD que l'utilisateur a payé sa reservation
 */
class update_paye extends sql {
    
    private $id;
    
    /**
     * Initialiser $id
     * @param int $id
     */
    function __construct($id) {
        parent::__construct();
        $this->id = $id;
    }
    
    /**
     * Requête pour mettre à jour la reservation
     */
    public function req_update() {
        $this->dbh->query('UPDATE reservation SET paye_reservation = 1 WHERE id_reservation = '.$this->id.'') or die(print_r($this->dbh->errorInfo()));
    }
}

?>
