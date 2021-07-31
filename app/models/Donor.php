<?php

  class Donor extends Model {
    private $_isLoggedIn, $_sessionName, $_cookieName;
    public static $currentLoggedInUser = null;
    public $id,$password,$nic,$donor_email,$donor_fname,$donor_lname,$donor_city,$donor_mobile,$donor_bloodgroup,$donor_age,$tested_diseases,$donor_sex,$dob,$acl,$deleted = 0;
    public function __construct($user='')
    {
      $table = 'donor';
      parent::__construct($table);
      $this->_sessionName = CURRENT_USER_SESSION_NAME;
      $this->_cookieName = REMEBER_ME_COOCKIE_NAME;
      $this->_softDelete = true;
      if ($user != '') {
        if (is_int($user)) {
          $u = $this->_db->findFirst('donor',['conditions'=>'id = ?', 'bind'=>[$user]],'Donor');
        } else {
          $u = $this->_db->findFirst('donor', ['conditions'=>'nic = ?','bind'=>[$user]],'Donor');
        }
        if ($u) {
          foreach ($u as $key => $val) {
            $this->$key = $val;
          }
        }
      }
    }

    public function findByUsername($username)
    {
      return $this->findFirst(['conditions'=>"nic = ?", 'bind'=>[$username]]);
    }

    public static function currentLoggedInUser()
    {
      if (!isset(self::$currentLoggedInUser) && Session::exists(CURRENT_USER_SESSION_NAME)) {
        $u = new Donor((int)Session::get(CURRENT_USER_SESSION_NAME));
        self::$currentLoggedInUser = $u;
      }
      return self::$currentLoggedInUser;

    }
    public function login($rememberMe=false)
    {
      Session::set($this->_sessionName, $this->id);
      if ($rememberMe) {
        $hash = md5(uniqid() + rand(0, 100));
        $user_agent = Session::uagent_no_version();
        Cookie::set($this->_cookieName, $hash, REMEBER_ME_COOCKIE_EXPIRY);
        $fields = ['session'=>$hash, 'user_agent'=>$user_agent, 'user_id'=>$this->id];
        $this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
        $this->_db->insert('user_sessions', $fields);
      }
    }

    public static function loginUserFromCookie()
    {
      $user_session_model = new UserSessions();
      $user_session = $user_session_model->findFirst([
        'conditions' => "user_agent = ? AND session = ?",
        'bind' => [Session::uagent_no_version(), Cookie::get(REMEBER_ME_COOCKIE_NAME)]
      ]);
      if ($user_session->user_id != '') {
        $user = new self((int)$user_session->user_id);
        $user->login();
        return $user;
      }



    }

    public function logout()
    {
      $user_agent = Session::uagent_no_version();
      $this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?",[$this->id, $user_agent]);
      Session::delete(CURRENT_USER_SESSION_NAME);
      if (Cookie::exists(REMEBER_ME_COOCKIE_NAME)) {
        Cookie::delete(REMEBER_ME_COOCKIE_NAME);
      }
      self::$currentLoggedInUser = null;
      return true;
    }

    public function registerNewUser($params)
    {

      $this->assign($params);
      $this->acl = htmlspecialchars_decode(json_encode(['Donor']), ENT_QUOTES);
      $this->deleted = 0 ;
      $this->password = password_hash($this->password, PASSWORD_DEFAULT);
      $this->save();
    }

    public function acls()
    {
      if (empty($this->acl)) return [];
      return json_decode($this->acl, true);

    }

    public function findDonorById($id)
  {
    $conditions = [
      'conditions' => 'id = ?',
      'bind' => [$id]
    ];
    $conditions = array_merge($conditions);
    return $this->findFirst($conditions);
  }


       public function displayName()
  {
    
    return $this->donor_fname . ' ' . $this->donor_lname;
    
  }

   public function getAllDonors( $params = [])
    {
        $conditions = [
        ];
        $conditions = array_merge($conditions, $params);

        return $this->findWithoutSoftDelete($conditions);
    }

     public function getAllDonor(){
        return $this->findFromTable('donor');
    }



   
  }

  
