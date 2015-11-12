<?php

include_once 'class/sql.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 *
 * @author romain
 */
class update_sl extends sql {
    
	private $id_site;
	private $id_log;
	private $nb;
	private $entree;
	private $piece;
	private $lit;
	private $wc;
	private $balcon;
	private $cloison;
	private $douche;
	private $prix;
	
	/**
	 * Initialisation des variables
	 * @param int $id_site
	 * @param int $id_log
	 * @param int $nb
	 * @param boolean $entree
	 * @param int $piece
	 * @param int $lit
	 * @param boolean $wc
	 * @param boolean $balcon
	 * @param boolean $cloison
	 * @param boolean $douche
	 */
	function __construct($id_site, $id_log, $nb, $entree, $piece, $lit, $wc, $balcon, $cloison, $douche,$prix) {
	    parent::__construct();
		$this->id_site = $id_site;
		$this->id_log = $id_log;
		$this->nb = $nb;
		$this->entree = $entree;
		$this->piece = $piece;
		$this->lit = $lit;
		$this->wc = $wc;
		$this->balcon = $balcon;
		$this->cloison = $cloison;
		$this->douche = $douche;
		$this->prix = $prix;
	}
	
	/**
	 * Requête pour modifier un site
	 */
	public function req_update() {
		$this->dbh->query('UPDATE site_logement 
		SET nb_log_sl = '.$this->nb.',
		entree_sl = '.$this->entree.',
		nb_piece_sl = '.$this->piece.',
		nb_lit_sl = '.$this->lit.',
		wc_sl = '.$this->wc.',
		balcon_sl = '.$this->balcon.',
		cloison_sl = '.$this->cloison.',
		douche_sl = '.$this->douche.',
		cout_sl = '.$this->prix.'
		WHERE id_site = '.$this->id_site.' AND id_log = '.$this->id_log.'') 
		or die(print_r($this->dbh->errorInfo()));
	}
}

?>
