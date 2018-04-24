<?php 

class MyPDO {

    private $dsn = 'mysql:dbname=exorh;host=localhost';
    private $user = 'root';
    private $password = '';
    public static $MyPDO = NULL;

    
    //Le constructeur est la "porte d'entrée" : 
    public function __construct(){

        //Connexion à la BDD :
        try{
            if(is_null(self::$MyPDO)){
                self::$MyPDO = new PDO($this->dsn, $this->user, $this->password);
            }
        }
        catch (PDOException $e){
            die('Problème de Connexion à la BDD : ' . $e->getMessage());
        }

       
        return self::$MyPDO;
    }


}
    

