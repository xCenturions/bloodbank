<?php

use SLWDC\NICParser\Parser;
use SLWDC\NICParser\Exception\InvalidArgumentException;

class AdminController extends Controller
{

  public function __construct($controller, $action)
  {
    parent::__construct($controller, $action);
    $this->load_model('Admin');
    $this->view->setLayout('default');
  }

  public function indexAction()
  {
    $validation = new Validate();

    if ($_POST) {

      // form validation
      $validation->check($_POST, [
        'username' => [
          'display' => "username",
          'required' => true
        ],
        'password' => [
          'display' => 'Password',
          'required' => true,

        ]
      ], true);
      if ($validation->passed()) {

        $user = $this->AdminModel->findByUsername($_POST['username']);

        //   }

        if ($user && Input::get('password') == $user->password) {
          $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
          $user->login($remember);
          Router::redirect('');
        } else {
          $validation->addError("There is an error with your User Name or Password");
        }
      }
    }

    $this->view->displayErrors = $validation->displayErrors();

    $this->view->render('admin/index');
  }

  public function logoutAction()
  {
    if (admin()) {
      admin()->logout();
    }
    Router::redirect('admin');
  }

  public function donorDetailsAction()
  {


    $donorModel = new Donor('donor');
    $donor =  $donorModel->getAllDonors();
    $this->view->donor = $donor;


    $this->view->render('admin/donorDetails');
  }

  public function adminProfileAction($id = null)
  {

    if($id != null) {
      $adminData = $this->AdminModel->findById($id);
    }

    $adminData = admin();

    //dnd(admin());

    $this->view->adminData = $adminData;
    $this->view->render('admin/adminProfile');
  }


  public function donorDataAction($id)
  {
    $donorModel = new Donor();

    $data = $donorModel->findDonorById($id);
    //dnd($data);
    $this->view->data = $data;

    $this->view->render('admin/donorData');
  }

  public function staffRegisterAction()
  {
    $this->view->username = '';
    $posted_values = ['staff_name' => '', 'staff_email' => '', 'username' => '',  'staff_address' => '', 'staff_mobile' => '', 'nic' => '', 'designation' => '', 'assigned' => '', 'acl' => '', 'password' => ''];

    //  if(isset($_POST['staff_name'])){
    //    $string=$_POST['staff_name'];
    //    $pattern = " ";
    //     $firstPart = strstr(strtolower($string), $pattern, true);
    //     $secondPart = substr(strstr(strtolower($string), $pattern, false), 0,3);
    //     $nrRand = rand(0, 100);

    //     $username = trim($firstPart).trim($secondPart).trim($nrRand);
    //   //dnd($username);
    //    
    //   $this->view->post = $posted_values;


    //  }

    $validation = new Validate();

    //dnd($_POST);    
    if ($_POST) {

      $posted_values = posted_values($_POST);
      //dnd($_POST);       
      $validation->check($posted_values, [
        'staff_name' => [
          'display' => 'Name',
          'required' => true

        ],




        'username' => [
          'display' => 'Username',
          'required' => true,
          'unique' => 'staff',
          'min' => 6,
          'max' => 150

        ],
        'staff_email' => [
          'display' => 'Email',
          'required' => true,
          'unique' => 'staff',
          'max' => 150,
          'valid_email' => true
        ],

        'nic' => [
          'display' => 'NIC',
          'required' => true,
          'valid_nic' => true
        ]

      ], true);


      if ($validation->passed()) {

        $newUser = new Staff();

        $pattern = " ";
        $firstPart = strstr(strtolower($posted_values['staff_name']), $pattern, true);
        $secondPart = substr(strstr(strtolower($posted_values['staff_name']), $pattern, false), 0, 3);
        $nrRand = rand(0, 100);

        $posted_values['password'] = trim($firstPart) . trim($secondPart) . trim($nrRand);
        //dnd( $posted_values['password']);

        //constructing email.


        $newUser->sendAccountDetails($posted_values['staff_email'], $posted_values['staff_name'], $posted_values['username'], $posted_values['password']);
        $newUser->registerNewUser($posted_values);
        // dnd($newUser->password);

        //$newUser->login();
        Router::redirect('');
      }
    }

    $bloodbanks = $this->AdminModel->getAllBloodbanks();

    $this->view->banks = $bloodbanks;





    /* This is an invalid ID number because 499 here is not indicating a valid
birth date */



    $this->view->post = $posted_values;
    $this->view->displayErrors = $validation->displayErrors();
    $this->view->render('admin/staffRegister');
  }
}
