<?php

require_once "model/CategorieManager.model.php";

require_once 'model/SessionManager.model.php';

//LISTE FILMS
function getSessions(){
    $sessionManager = new SessionManager();
    $sessions = $sessionManager->getSessions();
    $countStagiaires = $sessionManager->getCountStagiaire();
    require 'view/sessions_disponibles.view.php';
}

function getProgrammeSession($idSession){
    $sessionManager = new SessionManager();
    $intitules = $sessionManager->getIntitule($idSession);
    $modules = $sessionManager->getModules($idSession);
    require 'view/programme_session.view.php';
}

function addSession($intitule, $dateDebut, $dateFin, $nbPlaces){
    $sessionManager = new SessionManager();
    if($sessionManager->addSession($intitule, $dateDebut, $dateFin, $nbPlaces)){
         require 'view/add_session.view.php';
    }
    else echo "neineineinein!!!";  
}


function addModule($data = null){
    $msg = "";
    if(isset($data)){
        $nomModule = $data['nomModule'];
        $idCategorie = $data['idCategorie']; 
        $sessionManager = new SessionManager();
        if($sessionManager->addModule($nomModule, $idCategorie)){
            $msg = "Module enregistré,!";
        }                           
    }       
    $categorieManager = new CategorieManager();
    $categories = $categorieManager->getCategories(); 
   
    require 'view/add_module.view.php';
   
}