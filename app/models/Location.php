<?php

class Location extends Model
{

    public $id, $cid, $nearest_location, $date, $city, $time;
    public $deleted = 0;

    public function __construct()
    {
        $table = 'location';
        parent::__construct($table);
        $this->_softDelete = true;
    }

    // Get all locations
    public function getAllLocations($params = [])
    {
        $conditions = [];
        $conditions = array_merge($conditions, $params);

        return $this->findWithoutSoftDelete($conditions);
    }
    public function getAllCamps()
    {
        return $this->find(['conditions' => "DATE(date) > CURDATE()", 'bind' => []]);
    }


    public function findAllByTypeId($cid, $params = [])
    {
        $conditions = [
            'conditions' => 'cid = ?',
            'bind' => [$cid]
        ];
        $conditions = array_merge($conditions, $params);
        return $this->findWithoutSoftDelete($conditions);
    }

    //Get all types from type table without model direct access to DB
    public function getAllTypes()
    {
        return $this->findFromTable('type');
    }

    public function displayName()
    {
        return $this->fname . ' ' . $this->lname;
    }

    public function addCamp($params)
    {
        $this->assign($params);
        $this->deleted = 0;
        $this->save();
    }

    public function sortByDate($toDate, $fromDate)
    {
        return $this->find(['conditions' => "DATE(date) > CURDATE() AND date BETWEEN ? and ?   ", 'bind' => [$toDate, $fromDate]]);
    }
    public function findFromCity($ct)
    {
        return $this->find(['conditions' => "DATE(date) > CURDATE() AND city= ?   ", 'bind' => [$ct]]);
    }
    public function sortByCItyAndDate($city, $toDate, $fromDate)
    {
        return $this->find(['conditions' => "city =? AND DATE(date) > CURDATE() AND date BETWEEN ? and ?   ", 'bind' => [$city, $toDate, $fromDate]]);
    }
}
