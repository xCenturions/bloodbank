<?php

class Patient extends Model
{

    public $id, $pt_name, $dob, $pt_mobile, $pt_city, $qty, $pt_nic, $sex, $date, $location, $pt_bloodgroup;
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

        $this->deleted = 0;

        $this->save();
    }

    public function countPatientsBank($bank)
    {
        $stock = $this->query('SELECT count(*) as total FROM patient WHERE MONTH(date)=MONTH(NOW()) AND location =?', [$bank]);

        $results = $stock->results();

        return $results;
    }


    public function piechart()
    {

        $stock = "SELECT bld_grps, count(*) as count FROM stock GROUP BY bld_grps ";
        //  $db = DB::getInstance();
        $results = $this->query($stock, [])->results();

        return $results;
    }

    public function barchart()
    {

        $stock = "SELECT COUNT(id) as count,MONTHNAME(date) as month_name FROM stock WHERE YEAR(date) = '" . date('Y') . "'  GROUP BY YEAR(date),MONTH(date)";
        $db = DB::getInstance();
        $results = $db->query($stock)->results();

        return $results;
    }

    public function getAllFromStock()
    {
        return $this->findFromTable('stock');
    }
    public function getAllPatients($bank)
    {
        return $this->find(['conditions' => "location = ? ", 'order' => 'date DESC','bind' => [$bank] ]);
    }
    public function findByNIC($nic, $bank)
    {
        return $this->find(['conditions' => "pt_nic = ? AND location = ? ", 'order' => 'date DESC', 'bind' => [$nic, $bank]]);
    }
    public function sortByDate($f_date, $t_date, $bank)
    {
        return $this->find(['conditions' => "location = ? AND date BETWEEN ? and ? ", 'order' => 'date DESC', 'bind' => [$bank, $f_date, $t_date]]);
    }
    public function sortByNICAndDate($bank, $nic, $toDate, $fromDate)
    {

        return $this->find(['conditions' => "location = ? AND pt_nic =? date BETWEEN ? and ?", 'order' => 'date DESC', 'bind' => [$bank, $nic, $toDate, $fromDate]]);
    }
}
