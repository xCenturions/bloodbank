<?php

class Donation extends Model
{

  public $id, $donor_id, $staff_id, $location, $bld_grp, $date, $verified, $weight, $donor_name, $mo_name, $din_name, $of_name, $ph_name, $name,
    $history, $remarks, $cus, $bp, $cue, $pd, $hd, $temporary_deferral, $permanent_deferral, $resons_deferral, $hb_lvl1, $hb_lvl2, $Q, $T, $D, $S,
    $st_time, $et_time, $amount, $cm_no, $status, $tested_disease, $is_added;
  public $deleted = 0;



  public function __construct()
  {
    $table = 'donation_record';
    parent::__construct($table);
    $this->_softDelete = true;
  }


  public function addToDonation($params)
  {

    $this->assign($params);

    $this->deleted = 0;

    $this->save();
  }


  public function piechart()
  {

    $stock = "SELECT bld_grp, count(*) as count FROM donation_record GROUP BY bld_grp ";
    // $db = DB::getInstance();
    $results = $this->query($stock, [])->results();
    // dnd($results);
    return $results;
  }

  public function barchart()
  {

    $stock = "SELECT COUNT(id) as count,MONTHNAME(date) as month_name FROM donation_record WHERE YEAR(date) = '" . date('Y') . "'  GROUP BY YEAR(date),MONTH(date)";
    $db = DB::getInstance();
    $results = $db->query($stock)->results();

    return $results;
  }

  public function piechartBank($bank)
  {

    $stock = $this->query('SELECT bld_grp,location,  count(*) as count FROM donation_record where location = ? GROUP BY bld_grp  ', [$bank]);
    //  $db = DB::getInstance();
    $results = $stock->results();
    //dnd($results);
    return $results;
  }

  public function barchartBank($banks)
  {

    $stock =  $this->query("SELECT COUNT(*) as count, MONTHNAME(date) as month_name FROM donation_record WHERE location = ? AND  YEAR(date) =  date('Y')   GROUP BY YEAR(date),MONTH(date)  ", [$banks]);
    //$db = DB::getInstance();
    $results = $stock->results();

    return $results;
  }
  public function barchartMLT($banks)
  {

    $stock =  $this->query("SELECT COUNT(case when status='approved' then 1 end) as app_count, COUNT(case when status='rejected' then 1 end) as rej_count, MONTHNAME(date) as month_name FROM donation_record WHERE location = ? AND  YEAR(date) =  date('Y')   GROUP BY YEAR(date),MONTH(date)  ", [$banks]);
    //$db = DB::getInstance();
    $results = $stock->results();

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
  public function findById($id)
  {
    $conditions = [
      'conditions' => 'id = ? AND status = "unchecked"',
      'bind' => [$id]
    ];
    $conditions = array_merge($conditions);
    return $this->find($conditions);
  }

  public function findByCM($id)
  {
    $conditions = [
      'conditions' => 'cm_no = ? ',
      'bind' => [$id]
    ];
    $conditions = array_merge($conditions);
    return $this->find($conditions);
  }


  public function bloodBankSort($bank)
  {
    return $this->find(['conditions' => "bld_banks = ?", 'bind' => [$bank]]);
  }

  public function countRecords($bank)
  {
    $stock = $this->query('SELECT COUNT(id) as total FROM donation_record  where location = ?', [$bank]);

    $results = $stock->results();

    return $results;
  }

  public function countRecordsBank($bank)
  {
    $stock = $this->query('SELECT count(*) as total FROM donation_record WHERE MONTH(date)=MONTH(NOW()) AND location =?', [$bank]);

    $results = $stock->results();

    return $results;
  }

  public function getAllDonations()
  {
    $stock = $this->query('SELECT *  FROM donation_record INNER JOIN donor on 
    donation_record.donor_id = donor.id   ', []);

    $results = $stock->results();

    return $results;
  }
  public function getAllUncheckedDonations($bank)
  {
    $stock = $this->query('SELECT *  FROM donation_record INNER JOIN donor on 
    donation_record.donor_id = donor.id  where  donation_record.status = "unchecked"  and donation_record.location=? ', [$bank]);

    $results = $stock->results();
    // dnd($results);
    return $results;
  }
  public function getAllCheckedBlood($bank)
  {
    $stock = $this->query('SELECT *  FROM donation_record INNER JOIN donor on 
    donation_record.donor_id = donor.id  where  donation_record.status = "approved" OR donation_record.status = "rejected"  and donation_record.location=? ', [$bank]);

    $results = $stock->results();
    // dnd($results);
    return $results;
  }
  public function findByCMApproved($cm)
  {
    $stock = $this->query('SELECT *  FROM donation_record INNER JOIN donor on 
    donation_record.donor_id = donor.id  where  donation_record.status = "approved" AND cm_no=?   ', [$cm]);

    $results = $stock->results();
    // dnd($results);
    return $results;
  }
  public function getAllApprovedBlood($bank)
  {
    $stock = $this->query('SELECT *  FROM donation_record INNER JOIN donor on 
    donation_record.donor_id = donor.id  where  donation_record.status = "approved" AND donation_record.is_added = "No" and donation_record.location=? ', [$bank]);

    $results = $stock->results();
    // dnd($results);
    return $results;
  }

  public function sortByBldAndDate($bank, $toDate, $fromDate)
  {

    $stock = $this->query('SELECT *  FROM donation_record INNER JOIN donor on 
    donation_record.donor_id = donor.id where location = ? AND date BETWEEN ? and ?   ', [$bank, $toDate, $fromDate]);

    $results = $stock->results();

    return $results;
  }
  public function sortByDate($toDate, $fromDate)
  {

    $stock = $this->query('SELECT *  FROM donation_record INNER JOIN donor on 
    donation_record.donor_id = donor.id where  date BETWEEN ? and ?   ', [$toDate, $fromDate]);

    $results = $stock->results();

    return $results;
  }
  public function findFromBank($bank)
  {

    $stock = $this->query('SELECT *  FROM donation_record INNER JOIN donor on 
    donation_record.donor_id = donor.id where  location = ? ', [$bank]);

    $results = $stock->results();

    return $results;
  }
  public function findFromNic($nic)
  {

    $stock = $this->query('SELECT *  FROM donation_record INNER JOIN donor on 
    donation_record.donor_id = donor.id where  nic = ?  ', [$nic]);

    $results = $stock->results();

    return $results;
  }
  public function findCM($cm, $bank)
  {

    $stock = $this->query('SELECT *  FROM donation_record INNER JOIN donor on 
    donation_record.donor_id = donor.id where  cm_no = ? AND location = ? ', [$cm, $bank]);

    $results = $stock->results();

    return $results;
  }

  public function sortByCMAndDate($bank, $cm, $toDate, $fromDate)
  {

    $stock = $this->query('SELECT *  FROM donation_record INNER JOIN donor on 
    donation_record.donor_id = donor.id where  location = ? AND cm_no = ? AND date BETWEEN ? AND ?   ', [$bank, $cm, $toDate, $fromDate]);

    $results = $stock->results();

    return $results;
  }
}
