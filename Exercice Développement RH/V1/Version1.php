<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<form>
  <div class="form-group">


<!--Début du tableau -->
   <table class='table table-striped'>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Date D'embauche</th>
                <th>Date Fin</th>
                <th>Congès Pris</th>
                <th>Congès Disponibles</th>
            </tr> 
  

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
    $resultat = $bdd->query('SELECT id, firstName, lastName, address, dateBegin, dateEnd, pris, acquis   FROM salaries INNER JOIN conges WHERE salaries.id = conges.salaries_id');
    //Ne pas oublier FETCH_ASSOC sinon, risques de doublons.
    $salaries = $resultat->fetchAll(PDO::FETCH_ASSOC);
    //Pour chaque Salarié dans la table Salariés
    foreach($salaries as $salarie){
        echo "<tr>";

            //Pour chaque Données dans de chaque Salarié
            foreach($salarie as $cle=>$data){
                echo "<td>$data</td>";
            }
        
        echo "</tr>";
    }



    //Pour la V2, penser à créer un autoloader a la main

    ?>

    
    </table>
  </div>
</form>
   
</body>
</html>
