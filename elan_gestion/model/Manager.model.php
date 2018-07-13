<?php

abstract class Manager{
    
    //PERMET AUX ENFANTS DE LA CLASSE DE SE CONNECTER A LA BDD
    protected $db;
    
    protected function dbConnect(){
        
        try{
            //variables de connexion
            $host = 'phpmyadmin.elan-formation.eu';
            $dbname = 'em_gestion_session';
            $user = "e_niass";
            $password = 'elanformation67';
            
            $this->db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=UTF8;',$user,$password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            /*Probleme avec le PDO il faut ajouter cette dernière ligne*/
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            
        }
        catch(PDOException $e){
            echo 'Echec lors de la connexion : '.$e->getMessage();
        }
    }
}