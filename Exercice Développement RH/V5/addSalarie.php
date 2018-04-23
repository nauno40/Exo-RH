<!DOCTYPE html>
<html lang="en">

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

        <a class="navbar-brand" href="index.php">Exercice de Développement RH</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <a class="nav-item nav-link" href="addSalarie.php">Ajouter</a>

                <a class="nav-item nav-link" href="SalariesSupp.php">Salariés Supprimés</a>

                <form class="form-inline" method="GET" action="index.php">
                    <input class="form-control mr-sm-2" type="text" placeholder="Rechercher" name="key">
                    <button class="btn bg my-2 my-sm-0" type="submit">Go !</button>
                </form>

            </div>
        </div>
    </nav>

    <br>
    <h1>Ajouter un Salarié</h1>
    <br>

    <div class="container">
        <div class="row">
            <form class="col-md-8" method="POST" action="addSalarie.php">


                <div class="form-group col-md-3">
                    <label>Prénom</label>
                    <input type="Prénom" class="form-control" placeholder="Prénom" name="firstName">
                </div>

                <div class="form-group col-md-3">
                    <label>Nom</label>
                    <input type="Nom" class="form-control" placeholder="Nom" name="lastName">
                </div>

                <div class="form-group col-md-3">
                    <label>Adresse</label>
                    <input type="Adresse" class="form-control" placeholder="Adresse" name="address">
                </div>

                <div class="form-group col-md-3">
                    <label>Date D'embauche</label>
                    <input type="date" class="form-control" placeholder="Date D'embauche" name="dateBegin">
                </div>

                <div class="form-group col-md-3">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Enregister</button>
                </div>

            </form>
        </div>
    </div>
    <?php


    //Autoload :
    require 'class/autoloader.php';
    Autoloader::register();

    //Appel de la classe Salaries
    $instanceSalaries = new Salaries();



    if(!empty($_POST)){

        $post = [];

        foreach($_POST as $key => $value){
            $post[$key] = trim(strip_tags($value));
        }

        $errors = [];

        if (!isset($post['firstName']) OR empty($post['firstName'])){
            $errors['firstName'] = "Vous devez rentrer le Prénom du Salarié.";
        }

        if (!isset($post['lastName']) OR empty($post['lastName'])){
            $errors['lastName'] = "Vous devez rentrer le Nom du Salarié.";
        }

        if (!isset($post['address']) OR empty($post['address']) OR strlen($post['address']) < 5){
            $errors['address'] = "Vous devez rentrer l'adresse du Salarié.";
        }

        if (!isset($post['dateBegin']) OR empty($post['dateBegin'])){
            $errors['dateBegin'] = "Vous devez rentrer la date d'embauche du Salarié.";
        }



        if(!empty($error)){

            //Si pas d'erreurs ajouter les données dans la BBD :
            $instanceSalaries->AddSalarie($_POST['lastName'], $_POST['firstName'], $_POST['address'], $_POST['dateBegin']);

            echo "<div class='alert alert-success col-md-4' role='alert'>Le salarié : " . $_POST['firstName'] . " " . $_POST['lastName'] . " à bien été ajouté !</div>";
        }
        else{

            echo '<div class="container"><div class="row"><div class="alert alert-danger col-lg-4" role="alert">';

            foreach ($errors as $error) {
                 echo " $error ";
            }

            echo '</div></div>';

        }

    }
















    ?>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</body>

</html>