<!-- 
<table class="table table-striped table-light">
            <thead>
                <th>INTITULÉ SESSION</th>
                <th>DATE DE DÉBUT</th>
                <th>DATE DE FIN</th>
                <th>NOMBRES DE PLACES THÉORIQUES</th>
                <th>NOMBRES DE PLACES RÉSERVÉES</th>
                <th>NOMBRES DE PLACES RESTANTES</th>
                <th>DÉTAILS PROGRAMME</th>
            </thead>

 while ($session = $sessions->fetch()){
    
    $nb_places_restantes = ($session['nb_places_theoriques'])-($session['nb_places_reservees']);
    
    echo '<tr>';
    //[NOM DU CHAMP DANS LA BDD]
    echo '<td>'.$session['intitule_session'].'</td>';
    echo '<td>'.$session['date_debut'].'</td>';
    echo '<td>'.$session['date_fin'].'</td>';
    echo '<td>'.$session['nb_places_theoriques'].'</td>';
    echo '<td>'.$session['nb_places_reservees'].'</td>';
    echo '<td>'.$nb_places_restantes.'</td>';
    echo "<td><a href=index.php?action=programme_session&amp;idSession={$session['id_session']}>PLUS D'INFOS</a></td>";
    
    echo '</tr>';
    
}

echo '</table>';
-->

<div id="cards">

    <?php
    while ($session = $sessions->fetch()) {
        
        var_dump($session);
        var_dump($countStagiaires);

        $nb_places_restantes = $session['nb_places_theorique']-$countStagiaires;

        echo '<div class="card" style="width: 18rem;" id="card">
 
  <div class="card-body">
    <h5 class="card-title">' . $session["intitule"] . '</h5>
    <p class="card-text">Du ' . $session["date_debut"] . ' au ' . $session['date_fin'] . '</p>
    <p class="card-text">Nombre de places : ' . $session['nb_places_theorique'] . '</p>
    <p class="card-text">Nombre de places réservées : ' . $countStagiaires. '</p>
    <p class="card-text">Nombre de places restantes : ' . $nb_places_restantes . '</p>
    <a href=index.php?action=programme_session&amp;idSession=' . $session["id_session_formation"] . ' class="btn btn-primary">Plus d\'infos</a>
  </div>
</div>';
    }

    echo '</div>';
    
    var_dump($session);


//PERMET DE STOPPER MA CONNECTION A LA BDD
    $sessions->closeCursor();
    