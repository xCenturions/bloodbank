<?php

class Patient extends Model
{

    public $id, $pt_name,$dob,$pt_mobile,$pt_city,$qty,$pt_nic,$sex,$date;
    public $deleted = 0;

 public function __construct()
    {
        $table = 'patient';
        parent::__construct($table);
        $this->_softDelete = true;
    }


 public function register($params)
    {

      $this->assign($params);
     
      $this->deleted = 0 ;
     
      $this->save();
    }


public function piechart(){

         $stock = "SELECT bld_grps, count(*) as count FROM stock GROUP BY bld_grps ";  
        //  $db = DB::getInstance();
         $results = $this->query($stock,[])->results();
        
         return $results;

    }

public function barchart(){

         $stock = "SELECT COUNT(id) as count,MONTHNAME(date) as month_name FROM stock WHERE YEAR(date) = '" . date('Y') ."'  GROUP BY YEAR(date),MONTH(date)";  
         $db = DB::getInstance();
         $results = $db->query($stock)->results();

         return $results;

    }

 public function getAllFromStock(){
        return $this->findFromTable('stock');
    }



}
