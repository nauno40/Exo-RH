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
        $this->acquis = $acquis;         
    }

    public function setPris($pris){        
        $this->pris = $pris;         
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
    public function findAll($courantePage,$parPage){

        $all = array();

        $resultat = self::$MyPDO->prepare("SELECT * FROM $this->tableName INNER JOIN conges WHERE salaries.id = conges.salaries_id ORDER BY id LIMIT ".(($courantePage-1)*$parPage)." ,$parPage");
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

            if($data['dateEnd'] == "0000-00-00"){
                $salarie->setDateEnd = NULL;
            }else{
                $salarie->setDateEnd($data['dateEnd']);
            }
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

                if($data['dateEnd'] == "0000-00-00"){
                    $salarie->setDateEnd = NULL;
                }else{
                    $salarie->setDateEnd($data['dateEnd']);
                }
                $all[] = $salarie;
            }
            return $all;

    }



    // Pouvoir modifier les Congès 
    public function Update($id, $pris, $acquis){

        $resultat = self::$MyPDO->prepare('UPDATE conges SET acquis = :acquis, pris = :pris WHERE salaries_id = :salaries_id');
        $resultat->bindValue(':acquis', $acquis);
        $resultat->bindValue(':pris', $pris);
        $resultat->bindValue(':salaries_id', $id);
        $resultat->execute();

        header('Location: index.php');

    }

    // Ajouter un Salarié, il commence avec 0 congès acquis 
    public function AddSalarie($nom, $prenom, $adresse, $dateDebut, $dateFin){

        $resultat = self::$MyPDO->prepare('INSERT INTO salaries(firstName, LastName, address, dateBegin, dateEnd) VALUES(:firstName, :LastName, :address, :dateBegin, :dateEnd)');
        $resultat->bindValue(':firstName', $prenom);
        $resultat->bindValue(':LastName', $nom);
        $resultat->bindValue(':address', $adresse);
        $resultat->bindValue(':dateBegin', $dateDebut);
        $resultat->bindValue(':dateEnd', $dateFin);
        $resultat->execute();

    }

    // Pemettre de Supprimer un salarié mais pas définitivement :
    // Peut être rajouter un champ true/false dans la bbd qui lui permettrai ou non de s'afficher dans le findALl 
    // A méditer.

    public function DeleteSalarie(){

    }

}