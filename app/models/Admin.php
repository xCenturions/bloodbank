<?php

class Admin extends Model
{

  private $_isLoggedIn, $_sessionName, $_cookieName;
  public static $currentLoggedInUser = null;
  public $id, $password,$assigned, $username, $name, $acl, $email, $mobile, $nic, $deleted = 0;
  public function __construct($user = '')
  {
    $table = 'admin';
    parent::__construct($table);
    $this->_sessionName = ADMIN_SESSION_NAME;
    $this->_cookieName = REMEBER_ME_COOCKIE_NAME;
    $this->_softDelete = true;
    if ($user != '') {
      if (is_int($user)) {
        $u = $this->_db->findFirst('admin', ['conditions' => 'id = ?', 'bind' => [$user]], 'Admin');
      } else {
        $u = $this->_db->findFirst('admin', ['conditions' => 'username = ?', 'bind' => [$user]], 'Admin');
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
    return $this->findFirst(['conditions' => "username = ?", 'bind' => [$username]]);
  }

  public function login($rememberMe = false)
  {
    Session::set($this->_sessionName, $this->id);
    if ($rememberMe) {
      $hash = md5(uniqid() + rand(0, 100));
      $user_agent = Session::uagent_no_version();
      Cookie::set($this->_cookieName, $hash, REMEBER_ME_COOCKIE_EXPIRY);
      $fields = ['session' => $hash, 'user_agent' => $user_agent, 'user_id' => $this->id];
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

  public static function currentLoggedInUser()
  {
    if (!isset(self::$currentLoggedInUser) && Session::exists(ADMIN_SESSION_NAME)) {
      $u = new Admin((int)Session::get(ADMIN_SESSION_NAME));
      self::$currentLoggedInUser = $u;
    }
    return self::$currentLoggedInUser;
  }


  public function logout()
  {
    $user_agent = Session::uagent_no_version();
    $this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
    Session::delete(ADMIN_SESSION_NAME);
    if (Cookie::exists(REMEBER_ME_COOCKIE_NAME)) {
      Cookie::delete(REMEBER_ME_COOCKIE_NAME);
    }
    self::$currentLoggedInUser = null;
    return true;
  }

  public function acls()
  {
    if (empty($this->acl)) return [];
    return json_decode($this->acl, true);
  }

  public function displayName()
  {
    return $this->donor_fname . ' ' . $this->donor_lname;
  }

  public function getAllBloodbanks()
  {
    return $this->findFromTable('bloodbanks');
  }
  public function getAllAdmins()
  {
    return $this->findFromTable('admin');
  }

  public function allBanks()
  {

    $stock =  $this->query("SELECT COUNT(id) as total FROM bloodbanks   ", []);
    //$db = DB::getInstance();
    $results = $stock->results();

    return $results;
  }
  public function sortByBank($bank)
  {

    $stock =  $this->query("SELECT * FROM admin WHERE assigned = ?   ", [$bank]);
    //$db = DB::getInstance();
    $results = $stock->results();

    return $results;
  }
  
  public function searchByNic($nic)
  {

    $stock =  $this->query("SELECT * FROM admin WHERE nic = ?   ", [$nic]);
    //$db = DB::getInstance();
    $results = $stock->results();

    return $results;
  }

  public function countAdmin()
  {

    $stock =  $this->query('SELECT COUNT(id) as total FROM admin WHERE assigned != NULL ', []);
    //$db = DB::getInstance();
    $results = $stock->results();

    return $results;
  }

  public function registerAdmin($params)
  {
    $this->assign($params);
    $this->acl = '["Admin"]';
    $this->save();
  }
  public function sendAccountDetails($email, $name, $username, $password)
  {
    $subject = "Your Admin Account Details";

    //change the HTML code of the mailer here. Be sure to include the confirmation link!
    $body = "<html>
              <body>

                <p>Hi," . $name . "</p>
                
                <p>Your Admin Account Has been successfully Created</p>
                <p>Here's your Username : " . $username . "</p>
                <p>Here's your Password : " . $password . "</p>

              </body>
            </html>";
    //This will display if the mail client cannot display HTML.
    $altBody = "";

    //sending mail:
    sendMail($email, $body, $altBody, $subject);
  }
}
