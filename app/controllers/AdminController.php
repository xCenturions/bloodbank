<?php

class AdminController extends Controller{

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
        ],true);
         if ($validation->passed()) {
     
             $user = $this->AdminModel->findByUsername($_POST['username']);
            
        //   }

          if ($user && Input::get('password') == $user->password) {
            $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
            $user->login($remember);
            Router::redirect('');
          }else {
            $validation->addError("There is an error with your User Name or Password");
          }
        }
      }

      $this->view->displayErrors = $validation->displayErrors();

      $this->view->render('admin/index');

    }

     public function logoutAction()
  {
    if(admin()) {
        admin()->logout();
    }
    Router::redirect('admin/index');
  }

  public function donorDetailsAction(){


     $donorModel = new Donor('donor');
     $donor =  $donorModel->getAllDonors();
    $this->view->donor= $donor;
    
   
       $this->view->render('admin/donorDetails');
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
    $validation = new Validate();
    $posted_values = ['staff_name'=>'','staff_email'=>'', 'username'=>'', 'password'=>'', 'confirm'=>'', 'staff_address'=>'','staff_mobile'=>''];
                  
    if ($_POST) {
      $posted_values = posted_values($_POST);
      //dnd($_POST);       
      $validation->check($_POST, [
        'staff_name' => [
          'display' => 'Name',
          'required' => true
        
        ],

        'username' => [
          'display' => 'National Identity Card Number',
          'required' => true ,
          'unique' => 'staff',
          'min' => 6,
          'max' => 150

        ],
        'staff_email' => [
          'display' => 'Email',
          'required' => true ,
          'unique' => 'staff',
          'max' => 150,
          'valid_email' => true
        ],
        'password' => [
          'display' => 'Password',
          'required' => true ,
          'min' => 6,
        ],
        'confirm' => [
          'display' => 'nic',
          'required' => true ,
          'matches' => 'password',
          ]
      ],true);
     
      if ($validation->passed()) {
        $newUser = new Staff();
        $newUser->registerNewUser($_POST);
       
        //$newUser->login();
        Router::redirect('');

      }
    }
    $this->view->post = $posted_values;
    $this->view->displayErrors = $validation->displayErrors();
    $this->view->render('admin/staffRegister');
  }

}