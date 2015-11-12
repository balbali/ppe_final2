<?php

include_once 'sql.php';

class authentification extends sql {
    
    private $email;
    private $mdp;
    
    function __construct($email, $mdp) {
		parent::__construct();
        $this->email = $email;
        $this->mdp = $mdp;
		
    }
    
    public function authentification(){
       $req = $this->dbh->query('SELECT * FROM user where email_user = "'.$this->email.'" AND mdp_user = "'.$this->mdp.'"') or die(print_r($this->dbh->errorInfo()));
        // fetch() renvoit toutes les donnes de la requête dans la variable $data
        $data = $req->fetch();
        if(!empty($data)) { 
		$_SESSION['id'] = $data['id_user'];
		$_SESSION['user'] = $data['nom_user'];
		$_SESSION['prenom'] = $data['prenom_user'];
		$_SESSION['email'] = $data['email_user'];
		$_SESSION['mdp'] = $data['mdp_user'];
		$_SESSION['rang'] = $data['rang_user'];
		$_SESSION['date_user'] = $data['date_user'];
		header('Location: panel.php');
        }
    }

}
?>
