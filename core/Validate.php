<?php

  class Validate {
    private $_passed=true , $_errors=[], $_db=null;

    public function __construct()
    {
      $this->_db = DB::getInstance();
    }

    public function check($source, $items=[], $csrfCheck = false)
    {
      $this->_errors = [];
      if ($csrfCheck) {
        $csrfPass = FH::checkToken($source['csrf_token']);

          if (!isset($source['csrf_token']) || !$csrfPass) {

            $this->addError(['Something wrong','csrf_token']);
          }
      }
      foreach ($items as $item => $rules) {
        $item = Input::sanitize($item);
        $display = $rules['display'];
        foreach ($rules as $rule => $rule_value) {
          $value = Input::sanitize(trim($source[$item]));    
          if($rule === 'required' && empty($value)){
            $this->addError(["{$display} is required", $item]);
          }elseif (!empty($value)) {
            switch($rule){
              case 'min';
              if (strlen($value) < $rule_value) {
                $this->addError(["{$display} must be a minimum of {$rule_value} characters." , $item]);
              }
              break;

              case 'max';
              if (strlen($value) > $rule_value ) {
                $this->addError(["{$display} must be a maximum of {$rule_value} characters." , $item]);
              }
              break;

              case 'matches';
              if ($value != $source[$rule_value]) {
                $matchDisplay = $items[$rule_value]['display'];
                $this->addError(["{$matchDisplay} and {$display} must match", $item]);
              }
              break;

              case 'unique';
                 $check = $this->_db->query("SELECT {$item} FROM {$rule_value} WHERE {$item} = ?", [$value]);
                 if ($check->count()) {
                   $this->addError(["{$display} already exists. Please choose another {$display}", $item]);

                 }
                 break;

              case 'not_exists';
                 $check = $this->_db->query("SELECT {$item} FROM {$rule_value} WHERE {$item} = ?", [$value]);
                 if (!$check->count()) {
                   $this->addError(["Email Does Not Exist", $item]);

                 }
                 break;

                 case 'unique_update';
                  $t = explode(',', $rule_value);
                  $table = $t[0];
                  $id = $t[1];
                  $query = $this->_db->query("SELECT * FROM {$table} WHERE id != ? AND {$item} = ?",[$id,$value]);
                  if ($query->count()) {
                    $this->addError(["{$display} already exists. Please choose another {$display}", $item]);
                  }
                  break;

                  case 'is_numeric';
                  if (!is_numeric($value)) {
                    $this->addError(["{$display} has to be a number. Please use a numeric value", $item]);
                  }
                  break;

                  case 'valid_email';
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                      $this->addError(["{$display} must be a valid email address", $item]);
                    }
                    break;

                  case 'valid_mobile';
                    if (!preg_match('/^[0-9]{10}+$/', $value)) {
                      $this->addError(["{$display} must be a valid mobile number", $item]);
                    }
                    break;

                  case 'valid_number';
                    if (!preg_match('/^[0-9]/', $value)) {
                      $this->addError(["{$display} must be a valid mobile number", $item]);
                    }
                    break;

                  case 'valid_nic';
                  if(validNIC($value)  ){
                      $msg = validNIC($value); 
                    $this->addError(["NIC Number is not valid. ".$msg, $item]);
                   
                    }
                    break;

                 case 'valid_age';
                 if(validateAge($value)) {
                   $this->addError(["Your age must be over 18", $item]);
                 }
                 break;

                   
            }
          }
        }
      }

      if (empty($this->_errors)) {
        $this->_passed = true;
      }
      return $this;
    }

    public function addError($error)
    {
      $this->_errors[] = $error;
      if (empty($this->_errors)) {
          $this->_passed = true;
      }else {
        $this->_passed = false;
      }
    }

    public function errors()
    {
      return $this->_errors;
    }

    public function passed()
    {
      return $this->_passed;
    }

    public function displayErrors()
    {
      $html = '<ul >';
      foreach($this->_errors as $error){
        if (is_array($error)) {

        $html .= '<li class="text-danger">'.$error[0].'</li>';
        $html .= '<script>jQuery("document").ready(function(){jQuery("#'.$error[1].'").parent().closest("div").addClass("has-error");});</script>';
      } else{
        $html .= '<li class="text-danger">'.$error.'</li>';
      }
      }
      $html .= '</ul>';
      return $html;
    }
  }
