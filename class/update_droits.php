<?php

include_once 'class/sql.php';

/**
 * Ajouter des droits à un utilisateur
 *
 * @author romain
 */
class update_droits extends sql {

    private $id;

    /**
     * Initialisation des variables
     * @param String $id
     */
    function __construct($id) {
        parent::__construct();
        $this->id = $id;
    }
    
    /**
     * Requête pour ajouter des droits à un user
     */
    public function req_add() {
        $this->data = $this->dbh->query('
        UPDATE user SET rang_user = 1
        WHERE id_user = '.$this->id.'
		')->fetchAll();
    }

    /**
     * Requête pour supprimer les droits d'un user
     */
    public function req_remove() {
        $this->data = $this->dbh->query('
        UPDATE user SET rang_user = 0
        WHERE id_user = '.$this->id.'
        ')->fetchAll();
    }
}

?>
