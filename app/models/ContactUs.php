<?php

class ContactUs extends Model {

public $id,$name,$email,$message,$status;
public $deleted = 0;

  public function __construct()
  {
    $table = 'contactus';
    parent::__construct($table);
    $this->_softDelete = true;
  }

  public function addMessage($params){

     $this->assign($params);
     $this->status = 'unopened';
      
      $this->save();

  }

   public function getAllMessages(){
        return $this->findFromTable('contactus');
    }

  

}


?>