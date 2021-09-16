<?php
use PHPMailer\PHPMailer\PHPMailer;



  class Donor extends Model {
    private $_isLoggedIn, $_sessionName, $_cookieName;
    public static $currentLoggedInUser = null;
    public $id,$password,$nic,$donor_email,$donor_name,$donor_lname,$donor_city,$donor_mobile,$donor_bloodgroup,$donor_age,$tested_diseases,$donor_sex,$dob,
     $verification_code,$is_active,$form,$acl,$deleted = 0;
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
      $this->form = 'not_submitted' ;
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
    public function findId($id)
  {
    $conditions = [
      'conditions' => 'id = ?',
      'bind' => [$id]
    ];
    $conditions = array_merge($conditions);
    return $this->find($conditions);
  }

  public function findDonorMapData($donor_city)
  {
    $conditions = [
      'conditions' => 'donor_id = ?',
      
    ];
    $result = $this->query('SELECT * FROM donor LEFT JOIN cities on 
    donor.donor_city = cities.name where donor_city = ? ',[$donor_city]);
    // dnd($result);
    return $result->results();

  }

  public function findDonorData($id)
  {
   
    $result = $this->query('SELECT * FROM form INNER JOIN donor on 
    donor.id = form.donor_id where donor.id = ? ',[$id]);
    // dnd($result);
    return $result->results();

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
     public function getAllCities(){
        return $this->findFromTable('cities');
    }


 
public function verification($email,$confirmation,$name){
    include(ROOT . DS . 'app' . DS . 'lib' . DS . 'Email' . DS . 'settings.php');
    //constructing email.
    $db = DB::getInstance();
    $id =$db->lastId();
    $confirmationLink = $siteURL."donor/verify?id=".$id."&hash=".$confirmation."";

    //change the HTML code of the mailer here. Be sure to include the confirmation link!
    $body = "<html>
              <body>

                <p>Hi,.$name.</p>
                <p>Thank you for signing up with us!</p>
                <p> Click <a href=\"".$confirmationLink."\">here</a> to confirm your account.</p>

              </body>
            </html>";
  //This will display if the mail client cannot display HTML.
    $altBody = "Copy and paste the following link into your browser window to activate your account: ".$confirmationLink."";

    //sending mail:
    sendConfirmationMail($email, $body, $altBody);

// else {
//   echo "Something went wrong. Please try again later.";
// }

  }


  public function verify($id){

     include(ROOT . DS . 'app' . DS . 'lib' . DS . 'Email' . DS . 'settings.php');

    $query = "SELECT `".$confirmationHashColumnName."`,`".$verificationStatusColumnName."` FROM `".$tableName."` WHERE `id`=".$id;
 
      $results = $this->query($query,[])->results();
       
         return $results;

  }


   
  }

  
