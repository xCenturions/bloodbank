<?php

class Camp extends Model
{

    public $id, $name, $nic, $mobile, $email, $location, $nst_bank, $date, $city;
    public $deleted = 0;

    public function __construct()
    {
        $table = 'requestcamp';
        parent::__construct($table);
        $this->_softDelete = true;
    }


    public function requestCamp($params)
    {
        $this->assign($params);
        $this->deleted = 0;
        $this->save();
    }

    public function getAllCamps($bank)
    {
        return $this->find(['conditions' => "status= 'unchecked' AND nst_bank = ?", 'bind' => [$bank]]);
    }

    public function sortByDate($bank, $toDate, $fromDate)
    {
        return $this->find(['conditions' => "status= 'unchecked' AND nst_bank = ? AND date BETWEEN ? and ?   ", 'bind' => [$bank, $toDate, $fromDate]]);
    }
}
