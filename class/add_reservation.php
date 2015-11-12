<?php

include_once 'sql.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of add_reservation
 *
 * @author romain
 */
class add_reservation extends sql {
    
    private $semaine;
    private $user;
	private $site;
    private $log;
    private $pension;
    private $menage;
    
    /**
     * Initialisation des variables
     * @param int $semaine
     * @param int $user
	 * @param int $site
     * @param int $log
     * @param boolean $pension
     * @param boolean $menage
     */
    public function __construct($semaine, $user, $site, $log, $pension, $menage) {
        parent::__construct();
        $this->semaine = $semaine;
        $this->user = $user;
		$this->site = $site;
        $this->log = $log;
        $this->pension = $pension;
        $this->menage = $menage;
    }
    
    /**
     * Créer une reservation dans la base de données
     */
    public function req_add() {
        $this->dbh->query('INSERT INTO reservation(semaine_reservation, user_reservation, date_reservation, site_reservation, log_reservation, pension_reservation, menage_reservation) 
            VALUES('.$this->semaine.', '.$this->user.', NOW(), '.$this->site.', '.$this->log.', '.$this->pension.', '.$this->menage.')
                ');
    }
}

?>
