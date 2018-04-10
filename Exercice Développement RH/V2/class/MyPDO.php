<?php 

class MyPDO {

    public $dsn = 'mysql:dbname=exorh;host=localhost';
    public $user = 'root';
    public $password = '';
    private $bdd;

    
    //Le constructeur est la "porte d'entrée" : 
    public function __construct(){

        //Connexion à la BDD :
        try{			
            $db = new PDO($this->dsn, $this->user, $this->password);
        }
        catch (PDOException $e){
            die('Problème de Connexion à la BDD : ' . $e->getMessage());
        }

        $this->bdd = $db;
        return $this->bdd;
    }



    //Récupération des données présentes dans le tables : "salaries" & "conges" :
    public function findAll(){
        $resultat = $this->bdd->prepare("SELECT id, firstName, lastName, address, dateBegin, dateEnd, pris, acquis FROM salaries INNER JOIN conges WHERE salaries.id = conges.salaries_id");
        $resultat->execute();
        $data = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}
    

