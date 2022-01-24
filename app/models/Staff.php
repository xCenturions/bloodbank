<?php

class Staff extends Model
{
  private $_isLoggedIn, $_sessionName, $_cookieName;
  public static $currentLoggedInUser = null;
  public $id, $password, $username, $staff_email, $staff_name, $staff_mobile, $staff_address, $acl, $pro_img, $designation, $hash, $nic, $deleted = 0;
  public function __construct($user = '')
  {
    $table = 'staff';
    parent::__construct($table);
    $this->_sessionName = STAFF_SESSION_NAME;
    $this->_cookieName = REMEBER_ME_COOCKIE_NAME;
    $this->_softDelete = true;
    if ($user != '') {
      if (is_int($user)) {
        $u = $this->_db->findFirst('staff', ['conditions' => 'id = ?', 'bind' => [$user]], 'Staff');
      } else {
        $u = $this->_db->findFirst('staff', ['conditions' => 'username = ?', 'bind' => [$user]], 'Staff');
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

  public function logout()
  {
    $user_agent = Session::uagent_no_version();
    $this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
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

    if ($params['acl']) {
      $this->acl = htmlspecialchars_decode($params['acl'], ENT_QUOTES);
    }
    // dnd($this->acl);

    $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    $this->deleted = 0;
    $this->save();
  }

  public function findByUsername($username)
  {
    return $this->findFirst(['conditions' => "username = ?", 'bind' => [$username]]);
    
  }
  public function findById($id)
  {
    return $this->findFirst(['conditions' => "id = ?", 'bind' => [$id]]);
  }
  public function findByEmail($email)
  {
    return $this->findFirst(['conditions' => "staff_email = ?", 'bind' => [$email]]);
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
    $result = $this->query('SELECT * FROM cities LEFT JOIN donor  on donor.donor_city = cities.name ', []);
    // dnd($result);
    return $result->results();
  }

  public function searchDonorsByCity($donor_city)
  {
    //dnd($donor_city);

    $result = $this->query('SELECT * FROM cities LEFT JOIN donor on donor.donor_city = cities.name where donor_city = ?', [$donor_city]);
    // dnd($result->results());

    return $result->results();
  }

  public function getAllCities()
  {
    $result = $this->query('SELECT * FROM cities ORDER BY name ASC ', []);
    // dnd($result->results());

    return $result->results();
  }
  public function getAllDonors()
  {
    return $this->findFromTable('donor');
  }
  public function getAllStaff()
  {
    return $this->findFromTable('staff');
  }
  public function getAllBloodBanks()
  {
   $result = $this->query('SELECT * FROM bloodbanks ORDER BY bloodbank ASC ', []);
    // dnd($result->results());

    return $result->results();
  }


  public function displayName()
  {
    return $this->donor_fname . ' ' . $this->donor_lname;
  }


  public function updateCol()
  {

    $sql = $this->query('UPDATE contactus SET status = "opened"', []);

    return $sql;
  }


  public function findFromBlood($bld)
  {
    $conditions = [
      'conditions' => 'donor_bloodgroup = ? AND donor_city',
      //'bind' => [$bld],[$city]
    ];
    // $conditions = array_merge($conditions,$params=[]);
    // return $this->find($conditions);

    $result = $this->query('SELECT * FROM donor where donor_bloodgroup = ? ', [$bld]);
    //dnd($result);
    return $result->results();
  }

  public function findFromBloodAndCity($bld, $city)
  {
    $conditions = [
      'conditions' => 'donor_bloodgroup = ? AND donor_city',
      'bind' => [$bld], [$city]
    ];
    // $conditions = array_merge($conditions,$params=[]);
    // return $this->find($conditions);

    $result = $this->query('SELECT * FROM donor where donor_bloodgroup = ? AND donor_city =?', [$bld, $city]);
    //dnd($result);
    return $result->results();
  }

  public function sendMessage($email, $message, $name)
  {
    include(ROOT . DS . 'app' . DS . 'lib' . DS . 'Email' . DS . 'settings.php');
    //constructing email.

    $sub = "Request To Donate Blood";

    //change the HTML code of the mailer here. Be sure to include the confirmation link!
    $body = "<html>
              <body>

                <p>Hi,.$name.</p>
                
                <p> " . $message . "</p>

              </body>
            </html>";
    //This will display if the mail client cannot display HTML.
    $altBody = "";

    //sending mail:
    sendMail($email, $body, $altBody, $sub);
  }

  public function sendAccountDetails($email, $name, $username, $password)
  {
    $subject = "Your Account Details";

    //change the HTML code of the mailer here. Be sure to include the confirmation link!
    $body = "<html>
              <body>

                <p>Hi," . $name . "</p>
                
                <p>Your Account Has been successfully created</p>
                <p>Here's your Username : " . $username . "</p>
                <p>Here's your Password : " . $password . "</p>

              </body>
            </html>";
    //This will display if the mail client cannot display HTML.
    $altBody = "";

    //sending mail:
    sendMail($email, $body, $altBody, $subject);
  }

  
  public function forgetPassword($email, $hash, $id)
  {
    include(ROOT . DS . 'app' . DS . 'lib' . DS . 'Email' . DS . 'settings.php');
    //constructing email.
    $subject = "Change Password";
    $link = $siteURL . "staff/resetPassword?id=" . $id . "&hash=" . $hash . "";
    //change the HTML code of the mailer here. Be sure to include the confirmation link!
    $body = "<html>
              <body>

                <p> Click <a href=\"" . $link . "\">here</a> to reset your password.</p>

              </body>
            </html>";
    //This will display if the mail client cannot display HTML.
    $altBody = "";

    //sending mail:
    sendMail($email, $body, $altBody, $subject);
  }

  public function sortBy($bld, $city)
  {

    $result = $this->query('SELECT * FROM donor where donor_bloodgroup = ? AND donor_city =?', [$bld, $city]);
    //dnd($result);
    return $result->results();
  }
  public function countStaff($bld)
  {

    $result = $this->query('SELECT count(*) as total FROM staff WHERE  assigned =?', [$bld]);
    //dnd($result);
    return $result->results();
  }

  public function sortByBank($bank)
  {

    $stock =  $this->query("SELECT * FROM staff WHERE assigned = ?   ", [$bank]);
    //$db = DB::getInstance();
    $results = $stock->results();

    return $results;
  }
  
  public function searchByNic($nic)
  {

    $stock =  $this->query("SELECT * FROM staff WHERE nic = ?   ", [$nic]);
    //$db = DB::getInstance();
    $results = $stock->results();

    return $results;
  }


  public function searchByNameNic($nic)
  {
    $result = $this->query('SELECT * FROM donor where donor_name = ? OR nic  =?  ', [$nic, $nic]);
    //dnd($result->results());
    return $result->results();
  }
}
