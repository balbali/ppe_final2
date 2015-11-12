<?php

include_once 'sql.php';

class changemdp extends sql {
   
    private $nom;
    private $mdp;
    
    function __construct($nom, $mdp) {
		parent::__construct();
        $this->nom = $nom;
        $this->mdp = $mdp;
    }
    
    public function changemdp(){
      $this->dbh->query('UPDATE `user` SET `mdp_user`="'.$this->mdp.'" WHERE nom_user = "'.$this->nom.'"') or die(print_r($this->dbh->errorInfo()));
        $_SESSION['mdp'] = $this->mdp;
    }

}
?>
