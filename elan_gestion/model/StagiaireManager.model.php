<?php

require_once ('Manager.model.php');

class StagiaireManager extends Manager {

    public function __construct(){
        parent::dbConnect();
    }
    
    //LISTER TOUTES LES SESSIONS
    public function getStagiaires(){

        $stmt = "SELECT * FROM stagiaire";
        $req = $this->db->query($stmt);
        return $req;
    }
    /*information sur le stagiaire*/
    public function getInfosStagiaire($idStagiaire){


        $stmt = "SELECT id_stagiare, CONCAT(nom,  prenom) AS nom, sexe, telephone, ville, courriel, date_naissance
                 FROM stagiaire
                 WHERE id_stagiare = :id";
        $req = $this->db->prepare($stmt);
        $req->execute(array(':id' => $idStagiaire));
        return $req;

    }
    
    public function getSessionsStagiaire($idStagiaire){


        $stmt = "(SELECT sf.date_debut, sf.date_fin, sf.nb_places_theorique, sf.intitule
                 FROM session_formation sf, session_stagiaire ss, stagiaire s
                 WHERE sf.id_session_formation = ss.id_session_formation
                 AND ss.id_stagiare = s.id_stagiare 
                 AND s.id_stagiare = :id)";
        $req = $this->db->prepare($stmt);
        $req->execute(array(':id' => $idStagiaire));
        return $req;

    }
    /*rajouter un stagiaire*/
    public function addStagiaire($prenomStagiaire, $nomStagiaire, $sexeStagiaire, $datenaissanceStagiaire, $villeStagiaire, $courrielStagiaire, $telephoneStagiaire){
        
        $stmt = "INSERT INTO STAGIAIRE(prenom, nom, sexe, date_naissance, ville, courriel, telephone) 
                        VALUES (:prenom, :nom, :sexe, :date_naissance, :ville, :courriel, :telephone)";
        $req = $this->db->prepare($stmt);
        $req->execute(array(':prenom_stagiaire' => $prenomStagiaire,
                                              ':nom' => $nomStagiaire,
                                              ':sexe' => $sexeStagiaire,
                                              ':date_naissance' => $datenaissanceStagiaire,
                                              ':ville' => $villeStagiaire,
                                              ':courriel' => $courrielStagiaire,
                                              ':telephone' => $telephoneStagiaire));
        return $req;
        
    }

}
