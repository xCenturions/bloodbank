<?php
use PHPMailer\PHPMailer\PHPMailer;
  class Model{
    protected $_db, $_table, $_modelName, $_softDelete = false;
    public $id;

    public function __construct($table)
    {
      $this->_db = DB::getInstance();
      $this->_table = $table;
      $this->_modelName = str_replace(' ', '', ucwords(str_replace('_',' ', $this->_table)));
    }



    public function get_columns()
    {
      return $this->_db->get_columns($this->_table);
    }

    protected function _softDeleteParams($params){
      if ($this->_softDelete) {
        if (array_key_exists('conditions', $params)) {
          if (is_array($params['conditions'])) {
            $params['conditions'][] = "deleted != 1";
          }else {
            $params['conditions'] .= " AND deleted != 1";
          }
        }else {
          $params['conditions'] = "deleted != 1";
        }
      }
       return $params;
    }

    public function find($params= [])
    {
      $params = $this->_softDeleteParams($params);

      $resultsQuery = $this->_db->find($this->_table, $params,get_class($this));
      if(!$resultsQuery) return [];

      return $resultsQuery;
    }

    // Find without soft delete
    public function findWithoutSoftDelete($params= [])
    {
      
      $resultsQuery = $this->_db->find($this->_table, $params,get_class($this));
      if(!$resultsQuery) return [];

      return $resultsQuery;
    }

    // Get all from given table
    public function findFromTable($table, $params= [])
    {
      $resultsQuery = $this->_db->find($table, $params,get_class($this));
      if(!$resultsQuery) return [];

      return $resultsQuery;
    }


    public function findFirst($params = [])
    {
      $params = $this->_softDeleteParams($params);
      $resultsQuery = $this->_db->findFirst($this->_table, $params,get_class($this));

      return $resultsQuery;
    }

    public function findById($id)
    {
      return $this->findFirst(['conditions'=>"id = ?", 'bind' => [$id]]);
    }

    public function save()
    {
      $fields = getObjectProperties($this);

      //determine wether to update or INSERT
      if (property_exists($this, 'id') && $this->id != '') {
        return $this->update($this->id, $fields);
      } else {
        return $this->insert($fields);
      }
    }

    public function insert($fields)
    {
      if (empty($fields)) return false;
      return $this->_db->insert($this->_table, $fields);
    }

    public function update($id, $fields)
    {
      if(empty($fields) || $id == '') return false;
      return $this->_db->update($this->_table, $id, $fields);
    }

    public function delete($id = '')
    {
      if($id == '' && $this->id == '') return false;
      $id = ($id == '')? $this->id : $id;
      if($this->_softDelete){
        return $this->update($id, ['deleted' => 1]);
      }
      return $this->_db->delete($this->_table, $id);
    }

    public function query($sql, $bind)
    {
      return $this->_db->query($sql, $bind);
    }

    public function data()
    {
      $data = new stdClass();
      foreach (getObjectProperties($this) as $column => $value) {
        $data->column = $value;
      }
      return $data;
    }

    public function assign($params)
    {
      if (!empty($params)) {
        foreach ($params as $key => $val) {
          if (property_exists($this,$key)) {
              $this->$key = sanitize($val) ;
          }
        }
        return true;
      }
      return false;
    }

    protected function populateObjData($result)
    {
      foreach($result as $key => $val) {
        $this->$key = $val ;
      }
    }

public function sendMail($toEmail, $emailBody, $emailAltBody,$sub)
{
  include(ROOT . DS . 'app' . DS . 'lib' . DS . 'Email' . DS . 'settings.php');
  include(ROOT . DS . 'app' . DS . 'lib' . DS . 'Email' . DS  .'vendor' . DS . 'autoload.php');

  //dnd($toEmail);

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = $mailHost;
  
 
  $mail->SMTPAuth = true;
  $mail->Username = $mailUsername;
  $mail->Password = $mailPassword;
  $mail->SMTPSecure = $mailEncryptionType;
  $mail->Port = $mailPortNumber;

  $mail->setFrom($fromEmailID, $fromName);
  $mail->addAddress($toEmail);

  if($replyToEmailID)
  $mail->addReplyTo($replyToEmailID);

  if($BCCEmailID)
  $mail->addBCC($BCCEmailID);



  $mail->isHTML(true);

  $mail->Subject = $sub;
  $mail->Body    = $emailBody;
  $mail->AltBody = $emailAltBody;

  if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      //echo 'Message has been sent. Please check your inbox and spam folder.';
  }
}
  }


  