<?php

  class Staff extends Model {
    private $_isLoggedIn, $_sessionName, $_cookieName;
    public static $currentLoggedInUser = null;
    public $id,$password,$username,$staff_email,$staff_name,$staff_mobile,$staff_address,$acl,$deleted = 0;
    public function __construct($user='')
    {
      $table = 'staff';
      parent::__construct($table);
      $this->_sessionName = STAFF_SESSION_NAME;
      $this->_cookieName = REMEBER_ME_COOCKIE_NAME;
      $this->_softDelete = true;
      if ($user != '') {
        if (is_int($user)) {
          $u = $this->_db->findFirst('staff',['conditions'=>'id = ?', 'bind'=>[$user]],'Staff');
        } else {
          $u = $this->_db->findFirst('staff', ['conditions'=>'username = ?','bind'=>[$user]],'Staff');
        }
        if ($u) {
          foreach ($u as $key => $val) {
            $this->$key = $val;
          }
        }
      }
    }

 public static function currentLoggedInUser()
    {
      if (!isset(self::$currentLoggedInUser) && Session::exists(STAFF_SESSION_NAME)) {
        $u = new Staff((int)Session::get(STAFF_SESSION_NAME));
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
      Session::delete(STAFF_SESSION_NAME);
      if (Cookie::exists(REMEBER_ME_COOCKIE_NAME)) {
        Cookie::delete(REMEBER_ME_COOCKIE_NAME);
      }
      self::$currentLoggedInUser = null;
      return true;
    }

    public function registerNewUser($params)
    {
      $this->assign($params);
       // $this->id = $params['id'];
        if ($params['acl']){
            $this->acl = htmlspecialchars_decode($params['acl'],ENT_QUOTES);
        }
      $this->deleted = 0 ;
      $this->password = password_hash($this->password, PASSWORD_DEFAULT);
      $this->save();
    }

     public function findByUsername($username)
    {
      return $this->findFirst(['conditions'=>"username = ?", 'bind'=>[$username]]);
    }

    public function acls()
    {
      if (empty($this->acl)) return [];
      return json_decode($this->acl, true);

    }


     public function findDonorWithMapData()
  {
    $conditions = [
      'conditions' => 'donor_id = ?',
      
    ];
    $result = $this->query('SELECT * FROM donor LEFT JOIN cities  on donor.donor_city = cities.name ',[]);
    // dnd($result);
    return $result->results();

  }

  public function searchDonorsByCity($donor_city){

      $result = $this->query('SELECT * FROM donor LEFT JOIN cities on donor.donor_city = cities.name where donor_city = ?',[$donor_city]);


    return $result->results();

  }

    public function getAllCities(){
        return $this->findFromTable('cities');
    }


   public function displayName()
  {
    return $this->donor_fname . ' ' . $this->donor_lname;
  }
  

  public function updateCol(){

   $sql = $this->query('UPDATE contactus SET status = "opened"',[]);

   return $sql;
  }

  



}    