<?php

require_once ('Manager.model.php');

class CategorieManager extends Manager {

    public function __construct(){
        parent::dbConnect();
    }
    
    
    public function getCategories(){
        
        $stmt = "SELECT * FROM categorie";
        $req = $this->db->query($stmt);
        return $req;
        
   
    }
    
}