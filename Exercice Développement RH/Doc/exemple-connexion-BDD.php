
<?php

$PARAM_hote='localhost'; // le chemin vers le serveur
$PARAM_port='3306';
$PARAM_nom_bd='salaries'; // le nom de votre base de données
$PARAM_utilisateur='rh'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe='pwd-salaries'; // mot de passe de l'utilisateur pour se connecter
$connexion = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);


    // EXEMPLE : Select
    $resultats=$connexion->query("SELECT * FROM salaries"); 
    $resultats->setFetchMode(PDO::FETCH_OBJ);
    while( $ligne = $resultats->fetch() )
    {
            echo 'Utilisateur : '.$ligne->firstName.'<br />';
    }

/**
    // EXEMPLE : Update
    $connexion->exec("UPDATE salaries SET firstName='Anne' WHERE id = 1");
*/
    // Fin de la connexion
    $resultats->closeCursor();


?>