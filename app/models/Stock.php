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
