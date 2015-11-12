<?php

include_once 'class/sql.php';

/**
 * Obtenir toutes les infos concernant un utilisateur
 *
 * @author romain
 */
class infos_user extends sql {
    
	private $id;
	private $data;
	
	/**
	 * Initialisation des variables
	 * @param int $id
	 */
	function __construct($id) {
	        parent::__construct();
		$this->id = $id;
	}
	
	/**
	 * Obtenir les infos d'un utilisateur en fonction de son id
	 */
	public function req_data() {
		$req = $this->dbh->query('SELECT * FROM user WHERE id_user = "'.$this->id.'"') 
		or die(print_r($this->dbh->errorInfo()));
		$this->data = $req->fetch();
	}

	/**
	 * Retourne le tableau avec les données d'un user
	 * @return array
	 */
	public function get_data() {
		return $this->data;
	}
}

?>
