<?php

class Form extends Model {

public $id,$donor_id, $_1_1,$_1_2,$_1_3,$_1_4,$_1_5,$_1_6,$_1_7,$_2_1,$_2_2,$_2_3,$_2_4,$_2_5,$_2_6,
          $_3_1,$_3_2,$_4_1,$_4_2,$_4_3,$_4_4,$_4_5,$_4_6,$_5_1,$_5_2,$_5_3,$_5_4,$_6_1,$_6_2,$_7,$name,$nic,$mobile,$sex,$email,$dob,$address,$age,
          $_2_2_1,$_2_2_2,$_2_2_3,$_2_2_4,$_2_2_5,$_2_2_6,$_2_2_7,$_2_2_8,$_2_2_9;
public $deleted = 0;

  public function __construct()
  {
    $table = 'form';
    parent::__construct($table);
    $this->_softDelete = true;
  }

  public function submit($params){

     $this->assign($params);
     $this->donor_id = currentUser()->id;
      
      $this->save();

  }

  // public function donorData(){
  //   return $this->findFromTable('');
  // }

   

    public function getDonorData($id){

    $conditions = [
      'conditions' => 'donor_id = ?',
      'bind' => [$id]
    ];
    $conditions = array_merge($conditions);
    return $this->findFirst($conditions);
  
    }

    

  

}


?>