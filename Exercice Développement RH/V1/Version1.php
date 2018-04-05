<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



 <!-- Attention /!\ Zone PHP -->
    <?php

    //Variables de connexions à la BDD :
    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='3306'; // Le numéro du Port
    $PARAM_nom_bd='exorh'; // le nom de votre base de données
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter
        



    //Connexion à la BDD :
    try{			
        $bdd = new PDO
        ('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe,array
        (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }



    //Récupération des données présentes dans le tables : "salaries" & "conges" :
    $salaries = $bdd->query('SELECT * FROM salaries, conges');

    //pour afficher les salaries
    foreach($salaries as $salarie){
        //$article est un tableau qui contient les données : id, title, content ....
        echo '<td>';
        foreach($salarie as $cle=>$data){
            echo '<td>'.$cle . ' : ' .$data.'</td>';
        }
        echo '</td>';
    }







    ?>
</body>
</html>
