<?php


class Appo extends Model {

public $id,$donor_id,$preffered_time,$preffered_date,$nearest_location;
public $deleted = 0;

  public function __construct()
  {
    $table = 'appointment';
    parent::__construct($table);
    $this->_softDelete = true;
  }

  public function findAllByDonorId($donor_id)
  {
    $conditions = [
      'conditions' => 'donor_id = ?',
      'bind' => [$donor_id]
    ];
    // $conditions = array_merge($conditions,$params);
//dnd($conditions);
    return $this->find($conditions);

  }

  public function findByIdAndDonorId($id,$donor_id)
  {
    $conditions = [
      'conditions' => 'id = ? AND donor_id = ?',
      'bind' => [$id, $donor_id]
    ];
    $conditions = array_merge($conditions,$params=[]);
    return $this->findFirst($conditions);
  }

  public static $addValidation = [
    'nearest_location' => [
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
    ]
  ];

}
