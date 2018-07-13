<?php

require_once ('Manager.model.php');

class SessionManager extends Manager {

    public function __construct(){
        parent::dbConnect();
    }
    
    //LISTER TOUTES LES SESSIONS
    public function getSessions(){

        $statement = "SELECT * FROM session_formation";
        $req = $this->db->query($statement);
        return $req;
    }
    
    public function getIntitule($idSession){

        $statement = "SELECT intitule
                      FROM session_formation";
        $req = $this->db->prepare($statement);
        $req->execute(array('id' => $idSession));
        return $req;
    }
    /*fonction qui permet de compter le nombre de stagiaire dans la base de données*/
    public function getCountStagiaire(){
        /*on compte par rapport à l'identifiant du stagiaire*/
        
        $statement = "SELECT COUNT(id_stagiare) 
                      FROM stagiaire";
        $req = $this->db->query($statement);
        return $req->fetchColumn();
        
    }
    /*fonction qui determine les modules d'une sesssion*/
    public function getModules($idSession){


        $stmt = "(SELECT m.nom AS nom_module, c.nom AS nom_categorie
                 FROM em_gestion_session.categorie c join em_gestion_session.module m join em_gestion_session.session_module sm
                 WHERE c.id_categorie = m.id_categorie
                 AND m.id_module = sm.id_module
                 AND sm.id_session_formation = :id)";
        $req = $this->db->prepare($stmt);
        $req->execute(array('id' => $idSession));
        return $req;

    }
       /*fonction permettant de rajouter une session à la formation*/  
    public function addSession($intitule, $dateDebut, $dateFin, $nbPlaces){
        
        $stmt = "INSERT INTO session_formation (intitule, date_debut, date_fin, nb_places_theorique) 
                        VALUES (:intitule, :date_debut, :date_fin, :nb_places_theorique)";
        $req = $this->db->prepare($stmt);
        $req->execute(array('intitule' => $intitule,
                            'date_debut' => $dateDebut,
                            'date_fin' => $dateFin,
                            'nb_places_theorique' => $nbPlaces
                ));
                           
        return $req;
        
    }
    //*addition un module
    
    public function  addModule($nomModule, $idCategorie){
        
        $stmt = "INSERT INTO module (nom, id_categorie) 
                        VALUES (:nom, :id_categorie)";
        $req = $this->db->prepare($stmt);
        $req->execute(array('nom' => $nomModule,
                            'id_categorie' => $idCategorie));
        return $req;
        
    }


}
