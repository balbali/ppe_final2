<?php

include_once 'class/sql.php';

/**
 * Obtenir la liste des utilisateurs
 *
 * @author romain
 */
class liste_user extends sql {

    private $data;
	private $nom;
    private $prenom;
    private $email;

    /**
     * Initialisation des variables
     * @param String $prenom
     * @param String $nom
     * @param String $email
     */
    function __construct($prenom, $nom, $email) {
        parent::__construct();
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
    }
    
    /**
     * Requête pour rechercher des users en fonction de leur nom, leur prénom ou leur adresse mail
     */
    public function req_data() {
        $this->data = $this->dbh->query('
		SELECT * FROM user
		WHERE nom_user LIKE "'.$this->nom.'"
        OR prenom_user LIKE "'.$this->prenom.'"
        OR email_user LIKE "'.$this->email.'"
		')->fetchAll();
    }
    
    /**
     * Retourne le tableau des users
     * @return array
     */
    public function get_data() {
        return $this->data;
    }
}

?>
