<?php

class Salaries extends MyPDO{

    //déclaration des attributs
    private $id;
    private $firstName;
    private $lastName;
    private $address;
    private $dateBegin;
    private $dateEnd;
    private $acquis;
    private $pris;
    private $tableName = 'salaries';
    




    //Déclaration des Getters 
    public function getId(){
        return $this->id;
    }
    
    public function getFirstName(){
        return $this->firstName;
    }
    
    public function getLastName(){
        return $this->lastName;
    }
    
    public function getAddress(){
        return $this->address;
    }
    
    public function getDateBegin(){
        return $this->dateBegin;
    }
    
    public function getDateEnd(){
        return $this->dateEnd;
    }    

    public function getAcquis(){
        return $this->acquis;
    }
        
    public function getPris(){
        return $this->pris;
    }

    //setters
    public function setId($id){
        if(!empty($id) AND is_numeric($id)){
            $this->id = $id;
        }
    }

    public function setFirstName($firstName){
        if(!empty($firstName) AND is_string($firstName)){
            $this->firstName = $firstName; 
        }
    }

    public function setLastName($lastName){
        if(!empty($lastName) AND is_string($lastName)){
            $this->lastName = $lastName; 
        }
    }

    public function setAddress($address){
        if(!empty($address) AND is_string($address)){
            $this->address = $address; 
        }
    }

    public function setDateBegin($dateBegin){        
            $this->dateBegin = $dateBegin;         
    }

    public function setDateEnd($dateEnd){        
        $this->dateEnd = $dateEnd;         
    }

    public function setAcquis($acquis){
        if(!empty($acquis) AND is_numeric($acquis) AND $acquis >= 0){        
            $this->acquis = $acquis;   
        }      
    }

    public function setPris($pris){
        if(is_numeric($pris) AND $pris >= 0){              
            $this->pris = $pris; 
        }        
    }



    // __  __      _   _               _      
    // |  \/  | ___| |_| |__   ___   __| | ___ 
    // | |\/| |/ _ \ __| '_ \ / _ \ / _` |/ _ \
    // | |  | |  __/ |_| | | | (_) | (_| |  __/
    // |_|  |_|\___|\__|_| |_|\___/ \__,_|\___|
                                            
   
    // Permet d'avoir une pagination automatique 
    public function count(){
        $resultat = self::$MyPDO->prepare("SELECT COUNT(id) as nb FROM $this->tableName");
        $resultat->execute();
        $data = $resultat->fetch(PDO::FETCH_ASSOC);
        return $data;
    }


    //Récupération des données présentes dans le tables : "salaries" & "conges" :
    // Si $i = 0 -> Affiche ceux qui travaillent encore // Si $i = 1 -> Affiche ceux qui ne travaillent plus //
    public function findAll($courantePage,$parPage,$i){

        $all = array();

        $resultat = self::$MyPDO->prepare("SELECT * FROM $this->tableName INNER JOIN conges WHERE salaries.id = conges.salaries_id AND salaries.suppression = $i ORDER BY id LIMIT ".(($courantePage-1)*$parPage)." ,$parPage");
        $resultat->execute();
        $datas = $resultat->fetchAll(PDO::FETCH_ASSOC);

        //Transformation en Objet;
        foreach($datas as $data){

            $salarie = new Salaries();
            $salarie->setId($data['id']);
            $salarie->setFirstName($data['firstName']);
            $salarie->setLastName($data['lastName']);
            $salarie->setAddress($data['address']);
            $salarie->setDateBegin($data['dateBegin']);
            $salarie->setDateEnd($data['dateEnd']);
            $salarie->setAcquis($data['acquis']);
            $salarie->setPris($data['pris']);

            $all[] = $salarie;
        }
        return $all;
    }


    //Permettre la recherche en fonction du Nom de Famille 
    public function FindByLastName($key){

        $all = array();

            // Connexion à ta base de données
            $resultat = self::$MyPDO->prepare("SELECT * FROM $this->tableName INNER JOIN conges ON salaries.id = conges.salaries_id WHERE lastName LIKE :lastName");
            $resultat->bindValue(':lastName', '%' . $key . '%');
            $resultat->execute();
            $datas = $resultat->fetchAll(PDO::FETCH_ASSOC);

            //Transformation en Objet;
            foreach($datas as $data){

                $salarie = new Salaries();
                $salarie->setId($data['id']);
                $salarie->setFirstName($data['firstName']);
                $salarie->setLastName($data['lastName']);
                $salarie->setAddress($data['address']);
                $salarie->setDateBegin($data['dateBegin']);
                $salarie->setAcquis($data['acquis']);
                $salarie->setPris($data['pris']);
                $salarie->setDateEnd($data['dateEnd']);

            }
            return $all;

    }



    // Pouvoir modifier les Congès 
    public function Update($id, $pris, $acquis, $date){

        $resultat = self::$MyPDO->prepare('UPDATE salaries, conges SET salaries.dateEnd = :dateEnd, conges.acquis = :acquis, conges.pris = :pris WHERE salaries.id = :salaries_id AND conges.salaries_id = :salaries_id');

        $resultat->bindValue(':acquis', $acquis);
        $resultat->bindValue(':pris', $pris);
        $resultat->bindValue(':salaries_id', $id);
        $resultat->bindValue(':dateEnd', $date);
        $resultat->execute();

        //header('Location: index.php');

    }

    // Ajouter un Salarié, il commence avec 0 congès acquis 
    public function AddSalarie($lastName, $firstName, $address, $dateBegin){

        $acquis = '0';
        $pris = '0';

        //Ajout des données concernant la table salariés
        $resultat = self::$MyPDO->prepare('INSERT INTO $this->tableName(firstName, lastName, address, dateBegin) VALUES(:firstName, :lastName, :address, :dateBegin)');
        $resultat->bindValue(':firstName', $firstName);
        $resultat->bindValue(':lastName', $lastName);
        $resultat->bindValue(':address', $address);
        $resultat->bindValue(':dateBegin', $dateBegin);
        $resultat->execute();

        //Récupération de l'id du salarié
        $lastId = self::$MyPDO->lastInsertId();

        //Ajout des données concernant le dernier Salarié
        $resultat2 = self::$MyPDO->prepare('INSERT INTO conges(salaries_id, acquis, pris) VALUES(:salaries_id, :acquis, :pris)');
        $resultat2->bindValue(':acquis', $acquis);
        $resultat2->bindValue(':pris', $pris);
        $resultat2->bindValue(':salaries_id', $lastId);
        $resultat2->execute();

    }

    // Pemettre de Supprimer un salarié mais pas définitivement :
    // Voir pour faire un script ou quand la date de fin est antérieur à la date actuelle, lancer DeleteSalaries

    public function DeleteSalarie($id, $supp){

        $resultat = self::$MyPDO->prepare('UPDATE $this->tableName SET suppression = :suppression WHERE id = :id');
        $resultat->bindValue(':suppression', $supp);
        $resultat->bindValue(':id', $id);
        $resultat->execute();
    }
}