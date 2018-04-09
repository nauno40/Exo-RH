<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<form>
  <h2 class="form-group">Exercice de Développement RH</h2>

  <div class="form-group">

<!--Début du tableau -->
   <table class='table table-striped'>
        <tr align="center">
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

    //Autoload :
    require 'class/autoloader.php';
    Autoloader::register();



    $instancePDO = new MyPDO();
    $salaries = $instancePDO->findAll();

    

    foreach($salaries as $salarie){
        echo "<tr>";

            //Pour chaque Données dans de chaque Salarié
            foreach($salarie as $cle=>$data){
                echo "<td align='center'>$data</td>";
            }
        
        echo "</tr>";
    }



    ?>

    
    </table>
  </div>
</form>
   
</body>
</html>
