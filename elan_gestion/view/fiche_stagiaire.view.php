<?php
//**
// affichage de l'information personnelle d'un stagiaire
//

$infoStagiaire = $infosStagiaire->fetch();

echo "Nom : ".$infoStagiaire['nom']."<br>";
      
echo "Sexe : ".$infoStagiaire['sexe']."<br>";
echo "Date de naissance : ".$infoStagiaire['date_naissance']."<br>";
echo "Ville : ".$infoStagiaire['ville']."<br>";
echo "Courriel : ".$infoStagiaire['courriel']."<br>";
echo "Téléphone : ".$infoStagiaire['telephone']."<br><br>";

$infosStagiaire->closeCursor();

//**
// On affiche la ou les SESSIONS où s'est inscrit le stagiaire.
//

echo "SESSIONS PREVUES";




echo "<table class='table-striped table-light'>"
            . "<theader>"
                    . "<th>INTITULE SESSION</th>"
                    . "<th>DATE DEBUT</th>"
                    . "<th>DATE FIN</th>"
            . "</h2><theader>";


while ($sessionStagiaire = $sessionsStagiaire->fetch()){
    
      echo "<tr><td>" . $sessionStagiaire['intitule'] . "</td>";
      echo "<td>" . $sessionStagiaire['date_debut'] . "</td>";
      echo "<td>" . $sessionStagiaire['date_fin'] . "</td></tr>";
      
}
echo "</table>";
$sessionsStagiaire->closeCursor();
