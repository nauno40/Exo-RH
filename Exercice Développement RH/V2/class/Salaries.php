<?php

class Salaries implements PDO{

    //déclaration des attributs
    private $id;
    private $firstName;
    private $lastName;
    private $address;
    private $dateBegin;
    private $dateEnd;

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
            $this->$lastName = $lastName; 
        }
    }

    public function setAddress($address){
        if(!empty($address) AND is_string($address)){
            $this->daddress = $address; 
        }
    }

    public function setDateBegin($dateBegin){        
            $this->$dateBegin = $dateBegin;         
    }

    public function setDateEnd($dateEnd){        
        $this->$dateEnd = $dateEnd;         
    }
}