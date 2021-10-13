<?php


class Appo extends Model
{

  public $id, $donor_id, $preffered_time, $preffered_date, $location, $location_type;
  public $deleted = 0;

  public function __construct()
  {
    $table = 'appointment';
    parent::__construct($table);
    $this->_softDelete = true;
  }

  public function findAllByDonorId_temp($donor_id)
  {
    $conditions = [
      'conditions' => 'donor_id = ?',
      'bind' => [$donor_id]
    ];
    // $conditions = array_merge($conditions,$params);
    //dnd($conditions);
    // DND($conditions);
    return $this->find($conditions);
  }

  public function findAllByDonorId($donor_id)
  {
    $conditions = [
      'conditions' => 'donor_id = ?',
      'bind' => [$donor_id]
    ];
    $result = $this->query('SELECT * FROM type LEFT JOIN appointment on 
    appointment.location_type = type.id where donor_id = ? and appointment.deleted != 1', [$donor_id]);
    // dnd($result);
    return $result->results();
  }

  public function findByIdAndDonorId($id, $donor_id)
  {
    $conditions = [
      'conditions' => 'id = ? AND donor_id = ?',
      'bind' => [$id, $donor_id]
    ];
    $conditions = array_merge($conditions, $params = []);
    //dnd($conditions);
    return $this->findFirst($conditions);
  }

  public static $addValidation = [
    'location' => [
      'display' => 'Location',
      'required' => true,

    ],
    'preffered_date' => [
      'display' => 'Date',
      'required' => true,

    ],
    'preffered_time' => [
      'display' => 'Time',
      'required' => true,
    ],
    'location_type' => [
      'display' => 'Time',
      'required' => true,
    ]
  ];
}
