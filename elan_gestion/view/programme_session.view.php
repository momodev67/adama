<?php

//**
// on affiche  MODULE - CATEGORIE  - NOMBRE DE JOURS
//
$intitule = $intitules->fetch();

echo $intitule['intitule'];

echo "<table class='table-striped table-light'>"
            . "<theader>"
                . "<th>CATÉGORIE</th>"
                . "<th>MODULE</th>"
                . "<th>NOMBRE DE JOURS</th>"
            . "<theader>";

while($module = $modules->fetch()){
    echo "<tr><td>" .$module['nom_module']. "</td>"
            . "<td>" .$module['nom_categorie']. "</td>"                      
              
      . "</tr>";
}
$modules->closeCursor();
$intitules->closeCursor();


echo "</table>";
    