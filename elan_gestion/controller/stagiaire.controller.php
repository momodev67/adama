<?php

require_once 'model/StagiaireManager.model.php';

//LISTE stagiaires
function getStagiaires(){
    $stagiaireManager = new StagiaireManager();
    $stagiaires = $stagiaireManager->getStagiaires();
    require 'view/liste_stagiaires.view.php';
}

function getFicheStagiaire($idStagiaire){
    $stagiaireManager = new StagiaireManager();
    $infosStagiaire = $stagiaireManager->getInfosStagiaire($idStagiaire);
    $sessionsStagiaire = $stagiaireManager->getSessionsStagiaire($idStagiaire);
    require 'view/fiche_stagiaire.view.php';
}

function addStagiaire($prenomStagiaire, $nomStagiaire, $sexeStagiaire, $naissanceStagiaire, $villeStagiaire, $courrielStagiaire, $telephoneStagiaire){
    $stagiaireManager = new StagiaireManager();
    if($stagiaireManager->addStagiaire($prenomStagiaire, $nomStagiaire, $sexeStagiaire, $naissanceStagiaire, $villeStagiaire, $courrielStagiaire, $telephoneStagiaire)){
         require 'view/add_stagiaire.view.php';
    }
    else echo "neineineinein!!!";
   
}
