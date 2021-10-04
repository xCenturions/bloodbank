<?php

class Stock extends Model
{

    public $id, $bld_rbc,$bld_wbc,$bld_plasma,$bld_plates,$bld_grps,$bld_banks,$donor_id,$donor_nic,$date;
    public $deleted = 0;

 public function __construct()
    {
        $table = 'stock';
        parent::__construct($table);
        $this->_softDelete = true;
    }


 public function addToStock($params)
    {

      $this->assign($params);
     
      $this->deleted = 0 ;
     
      $this->save();
    }


public function piechart(){

         $stock = "SELECT bld_grps,bld_banks, count(*) as count FROM stock GROUP BY bld_grps ";  
        //  $db = DB::getInstance();
         $results = $this->query($stock,[])->results();
        //dnd($results);
         return $results;

    }
public function piechartBank($bank){

         $stock = $this->query('SELECT bld_grps,bld_banks,  count(*) as count FROM stock where bld_banks = ? GROUP BY bld_grps  ',[$bank]);  
        //  $db = DB::getInstance();
         $results = $stock->results();
        //dnd($results);
         return $results;

    }
public function countBlood($bank){

         $stock = $this->query('SELECT bld_grps,bld_banks,  count(*)  * 100.0 /  (100 ) as precentage FROM stock where bld_banks = ? GROUP BY bld_grps  ',[$bank]);  
        //  $db = DB::getInstance();
         $results = $stock->results();
        //dnd($results);
         return $results;

    }

public function barchartBank($banks){

         $stock =  $this->query("SELECT COUNT(id) as count,MONTHNAME(date) as month_name FROM stock WHERE bld_banks = ? AND  YEAR(date) = '" . date('Y') ."'  GROUP BY YEAR(date),MONTH(date)  ",[$banks]);  
         //$db = DB::getInstance();
         $results = $stock->results();

         return $results;

    }

 public function getAllFromStock(){
        return $this->findFromTable('stock');
    }

// public function findFromBlood($bld){
    

//      $result = $this->query('SELECT * FROM stock where bld_grps = ? ',[$bld]);
//      //dnd($result);
//     return $result->results();

//   }

    public function findFromBlood($bld)
    {
      return $this->find(['conditions'=>"bld_grps = ?", 'bind'=>[$bld]]);
    }
    public function bloodBankSort($bank)
    {
      return $this->find(['conditions'=>"bld_banks = ?", 'bind'=>[$bank]]);
    }
    public function sortByBldAndBank($bld,$bank)
    {
       $result = $this->query('SELECT * FROM stock where bld_grps = ? AND bld_banks =?',[$bld,$bank]);
     //dnd($result);
    return $result->results();

    }
    public function searchByNic($nic)
    {
      return $this->find(['conditions'=>"donor_nic = ? ", 'bind'=>[$nic]]);
    }


    public function bloodAlert(){

      $bank = 'Jaffna';
      $results = [];

     $count = $this->countBlood($bank);

     for($i = 0; $i < count($count); $i++){
      if ($count[$i]->precentage < 20.0){
          $results[] = $count[$i]->bld_grps;
      }
     }
      $alert = new Alerts();
     $alert->addAlert($results);

      return $results ;



    }

    



}
