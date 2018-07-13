
<?php

require_once 'controller/session.controller.php';
require_once 'controller/stagiaire.controller.php';
require_once 'controller/categorie.controller.php';

require 'view/navbar.view.html';

if(isset($_GET['action'])){
            
                switch ($_GET['action']){
                    
                    case 'accueil': require 'view/accueil.view.php'; break;

                    case 'sessions_disponibles': getSessions(); break;
                    
                    case 'liste_stagiaires': getStagiaires(); break;
                    
                    case 'programme_session':

                        $idSession = $_GET['idSession'];

                        getProgrammeSession($idSession);
                        
                        break;
                    
                    case 'fiche_stagiaire':

                        $idStagiaire = $_GET['idStagiaire'];

                        getFicheStagiaire($idStagiaire);
                        
                        break;
                    
                    case 'add_stagiaire': require 'view/add_stagiaire.view.php'; break;
                    
                    case 'insert_stagiaire': 
                        //@TODO insert into front controller

                        if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['sexe']) && !empty($_POST['']) && !empty($_POST['ville']) && !empty($_POST['courriel']) && !empty($_POST['telephone'])){
                            $p = $_POST['prenom'];
                            $nm = $_POST['nom'];
                            $s = $_POST['sexe'];
                            $n = $_POST['date_naissance'];
                            $v = $_POST['villeStagiaire'];
                            $e = $_POST['courriel'];
                            $t = $_POST['telephone'];
                            addStagiaire($p,$nm,$s,$n,$v,$e,$t);
                            
                            break;
                        }
                        
                    case 'add_session': require 'view/add_session.view.php'; break;
                    
                    case 'insert_session': 
                        //@TODO insert into front controller

                        if(isset($_POST['intitule']) && isset($_POST['dateDebut']) && isset($_POST['dateFin']) && isset($_POST['nbPlaces'])){ 
                            $i = $_POST['intitule'];
                            $dd = $_POST['dateDebut'];
                            $df = $_POST['dateFin'];
                            $nb = $_POST['nbPlaces'];
                            
                            addSession($i,$dd,$df,$nb);
                            
                            break;
                        }
                        
                    case 'add_module':
                        if(!empty($_POST)){
                            addModule($_POST);  
                        }
                        else addModule();                         
                        
                        break;                           
                    
                    default: getSessions();
                        
                }
}
else {
    require 'view/accueil.view.php';
}