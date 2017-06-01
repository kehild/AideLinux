<?php
class Action{

private $id;
private $action_mene;
private $description;

// Contructeur

 
   public function __construct(array $donnees){
    $this->hydrate($donnees);
  }


 public function hydrate(array $donnees){
    foreach ($donnees as $key => $value){
      $action = 'set'.ucfirst($key);
      
      if (method_exists($this, $action)){
        $this->$action($value);
      }
    }
  }

  
  
  
  
  

// Getter

public function getId(){
	return $this->id;
}

public function getAction_mene(){
	return $this->action_mene;
}

public function getDescription(){
	return $this->description;
}

// Setter

 function setId($id){
	$this->id = $id;
}

 function setAction_mene($action_mene){
	$this->action_mene = $action_mene;
}

 function setDescription($description){
	$this->description = $description;
}


}
?>