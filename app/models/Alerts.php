<?php

class Alerts extends Model {

public $id,$alert,$email,$status;
public $deleted = 0;

  public function __construct()
  {
    $table = 'alerts';
    parent::__construct($table);
    $this->_softDelete = true;
  }

  public function addAlert($params){

     $this->assign($params);
     $this->status = 'unopened';
      
      $this->save();

  }

   public function getAllMessages(){
        return $this->findFromTable('contactus');
    }

  

}


?>