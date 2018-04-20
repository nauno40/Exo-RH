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

                <form class="form-inline" method="GET" action="index.php">
                    <input class="form-control mr-sm-2" type="text" placeholder="Rechercher" name="key">
                    <button class="btn bg my-2 my-sm-0" type="submit">Go !</button>
                </form>

            </div>
        </div>
    </nav>

    <form class="col-md-10">
        <br>
        <h1>Ajouter un Salarié</h1>
        <br>

        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Prénom</label>
            <input type="Prénom" class="form-control" placeholder="Prénom">
        </div>

        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Nom</label>
            <input type="Nom" class="form-control" placeholder="Nom">
        </div>

        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Adresse</label>
            <input type="Adresse" class="form-control" placeholder="Adresse">
        </div>

        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Date D'embauche</label>
            <input type="Date D'embauche" class="form-control" placeholder="Date D'embauche">
        </div>

        <div class="form-group col-md-2">
            <button class="btn bg my-2 my-sm-0" type="submit">Enregister</button>
        </div>

    </form>

    
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</body>

</html>