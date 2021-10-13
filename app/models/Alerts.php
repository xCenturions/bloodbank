<?php

class Alerts extends Model {

public $id,$alert,$status,$bank,$date,$time;
public $deleted = 0;

  public function __construct()
  {
    $table = 'alerts';
    parent::__construct($table);
    $this->_softDelete = true;
  }

  public function addAlert($params,$bank){

     //$this->assign($params);
    // $params = 'ssdd';
    // $bank ='Ho';
    
    $date = date('Y-m-d');
    $time = date("h:i:sa");
    //dnd($time);
//dnd($params);
    //  if(isset($params['id'])){
    //  $this->id = $params['id'];
    $check=$this->findFromTable('alerts',['conditions'=>'bank = ?', 'bind'=>[$bank]]);
    //dnd($check);
      if(!empty($check) ){
     //dnd('asd');
           $this->query('UPDATE alerts SET alert =? , bank =? , status ="unopened" , date = ?,time =? WHERE bank =?',[$params,$bank,$date,$time,$bank]);
    
      }else{
        //dnd('ad');
        $this->query('INSERT INTO alerts (alert , bank , status ) VALUES (? ,? , "unopened")',[$params,$bank]);
      }

      
   

  }

   public function getAllAlerts($bank){
        return $this->findFromTable('alerts',['conditions'=>'bank = ?', 'bind'=>[$bank]]);
    }

  

}
