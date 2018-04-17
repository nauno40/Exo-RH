<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="Version2.php">Exercice de Développement RH</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            
            <a class="nav-item nav-link" href="#">Ajouter</a>

            <form class="form-inline" method="GET" action="version2.php">
                <input class="form-control mr-sm-2" type="text" placeholder="Rechercher" name="key">
                <button class="btn bg my-2 my-sm-0" type="submit">Go !</button>
            </form>

            </div>
        </div>
    </nav>


    <form>

        <div class="form-group">

            <!--Début du tableau -->
            <table class='table table-striped'>
                <tr align="center">
                    <th>ID</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Date D'embauche</th>
                    <th>Date de Fin de Contrat</th>
                    <th>Congès Pris</th>
                    <th>Congès Disponibles</th>
                </tr>


    <!-- Attention /!\ Zone PHP -->
    <?php

    //Autoload :
    require 'class/autoloader.php';
    Autoloader::register();


    //Appel de la classe Salaries
    $instanceSalaries = new Salaries();



    //Pagination Réalisation :
    $data = $instanceSalaries->count();
    $nbSalaries = $data['nb'];
    $parPage = 12; //Nombre de lignes par page 
    $nbPage = ceil($nbSalaries/$parPage);
    $courantePage = 1;  //Page courante
   
    if(isset($_GET['p'])){
        $courantePage = $_GET['p'];
    }
    else{
        $courantePage = 1;
    }

    


    //Si la variable >POST existe on lance la recherche sinon, on affiche tout
    if(isset($_GET['key']) && !empty($_GET)){
        $salaries = $instanceSalaries->Rechercher($_GET['key']);
    }
    else{
        //Appel de la méthode FindAll
        $salaries = $instanceSalaries->findAll($courantePage, $parPage);
    }




    //Affichage des différentes données des Salariés 
    foreach($salaries as $salarie){
        
        echo "<tr>";
        echo "<td align='center'>".$salarie->getId()."</td>";
        echo "<td align='center'>".$salarie->getFirstName()."</td>";
        echo "<td align='center'>".$salarie->getLastName()."</td>";
        echo "<td align='center'>".$salarie->getAddress()."</td>";
        echo "<td align='center'>".$salarie->getDateBegin()."</td>";
        echo "<td align='center'>".$salarie->getDateEnd()."</td>"; 
        echo "<td align='center'>".$salarie->getAcquis()."</td>";        
        echo "<td align='center'>".$salarie->getPris()."</td>";
        
        echo "</tr>";
        
    }




    ?>

            </table>


            <!-- Pagination Affichage : -->
            <ul class="pagination pagination-sm justify-content-center">
                <li class="page-item disabled">
                    <?php
                        for($i=1;$i<=$nbPage;$i++){
                            echo "<li class='page-item'><a class='page-link' href='Version2.php?p=$i'> $i </a>";
                        }
                    ?>
                </li>
            </ul>


        </div>
    </form>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>

</html>