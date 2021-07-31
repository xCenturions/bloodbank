<?php

class Donation extends Model
{

    public $id, $donor_id, $bld_grp,$bld_banks,$bld_cells,$date,$stk_id;
    public $deleted = 0;

 public function __construct()
    {
        $table = 'donation';
        parent::__construct($table);
        $this->_softDelete = true;
    }


 public function addToDonation($params)
    {

      $this->assign($params);
     
      $this->deleted = 0 ;
     
      $this->save();
    }


     public function piechart(){

         $stock = "SELECT bld_grp, count(*) as count FROM donation GROUP BY bld_grp ";  
         $db = DB::getInstance();
         $results = $db->query($stock)->results();

         return $results;

    }

     public function barchart(){

         $stock = "SELECT COUNT(id) as count,MONTHNAME(date) as month_name FROM donation WHERE YEAR(date) = '" . date('Y') ."'  GROUP BY YEAR(date),MONTH(date)";  
         $db = DB::getInstance();
         $results = $db->query($stock)->results();

         return $results;

    }

     public function findDonorById($id)
  {
    $conditions = [
      'conditions' => 'donor_id = ?',
      'bind' => [$id]
    ];
    $conditions = array_merge($conditions);
    return $this->find($conditions);
  }


}
