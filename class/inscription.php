<?php

include_once 'sql.php';

class inscription extends sql {
    
    private $nom;
    private $mdp;
    private $email;
    private $prenom;
    
    function __construct($nom, $prenom, $mdp, $email) {
	parent::__construct();
        $this->nom = $nom;
        $this->mdp = $mdp;
	$this->prenom = $prenom;
	$this->email = $email;
	
    }
    
    public function inscription(){
       $this->dbh->query('INSERT INTO `user`(`nom_user`, `prenom_user`, `email_user`, `mdp_user`) VALUES ("'.$this->nom.'", "'.$this->prenom.'", "'.$this->email.'", "'.$this->mdp.'")') or die(print_r($this->dbh->errorInfo()));
$req = $this->dbh->query('SELECT * FROM user where email_user = "'.$this->email.'" AND mdp_user = "'.$this->mdp.'"') or die(print_r($this->dbh->errorInfo()));
        // fetch() renvoit toutes les donnes de la requête dans la variable $data
        $data = $req->fetch();
            if(!empty($data))
            { 
               session_start();
               $_SESSION['id'] = $data['id_user'];
               $_SESSION['user'] = $data['nom_user'];
               $_SESSION['mdp'] = $data['mdp_user'];
	       $_SESSION['email'] = $data['email_user'];
	       $_SESSION['prenom'] = $data['prenom_user'];
               $_SESSION['date_user'] = $data['date_user'];
               header('Location: panel.php');
            }
                           

    }
	public function recherche(){
	$recherche = $this->dbh->query('SELECT email_user FROM user where email_user = "'.$this->email.'"')or die(print_r($this->dbh->errorInfo()));
	$search = $recherche->rowCount();	
	return $search;
			
}

}
?>
