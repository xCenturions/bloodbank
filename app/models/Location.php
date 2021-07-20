<?php

class Location extends Model
{

    public $id, $cid, $nearest_location;
    public $deleted = 0;

    public function __construct()
    {
        $table = 'location';
        parent::__construct($table);
        $this->_softDelete = true;
    }

    // Get all locations
    public function getAllLocations( $params = [])
    {
        $conditions = [
        ];
        $conditions = array_merge($conditions, $params);

        return $this->findWithoutSoftDelete($conditions);
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
    public function getAllTypes(){
        return $this->findFromTable('type');
    }

    public function displayName()
    {
        return $this->fname . ' ' . $this->lname;
    }

   
}
