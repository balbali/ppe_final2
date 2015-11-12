<?php

/**
 * Classe abstraite pour la connexion sql
 *
 */
abstract class sql {


    protected $dbh;
    
    /**
     * Mise en place de la variable en lien avec la base de données
     */
    function __construct() {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=ppe2', 'root', '');
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }   
    }
}
