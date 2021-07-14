<?php

  class DonorController extends Controller{

    public function __construct($controller, $action)
    {
      parent::__construct($controller, $action);
      $this->load_model('Donor');
      $this->view->setLayout('default');
    }

    public function loginAction()
    {
      $validation = new Validate();

      if ($_POST) {
        // form validation
        $validation->check($_POST, [
          'nic' => [
            'display' => "nic",
            'required' => true
          ],
          'password' => [
            'display' => 'Password',
            'required' => true,
            'min' => 6
          ]
        ],true);
         if ($validation->passed()) {
        //   if($_POST['acl'] == 'Staff'){
        //     $staffModel = new StaffModel('staff');
        //     $user = $this->StaffModel->findByUsername($_POST['nic']);
        //   }
        //   else{
             $user = $this->DonorModel->findByUsername($_POST['nic']);
        //   }

          if ($user && password_verify(Input::get('password'), $user->password)) {
            $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
            $user->login($remember);
            Router::redirect('');
          }else {
            $validation->addError("There is an error with your nic or pw");
          }
        }
      }

      $this->view->displayErrors = $validation->displayErrors();

      $this->view->render('donor/login');

    }

  public function logoutAction()
  {
    if(currentUser()) {
        currentUser()->logout();
    }
    Router::redirect('donor/login');
  }

  public function registerAction()
  {
    $validation = new Validate();
    $posted_values = ['donor_fname'=>'','donor_lname'=>'', 'nic'=>'', 'donor_email'=>'', 'password'=>'', 'confirm'=>'', 'donor_age'=>'','donor_sex'=>'','donor_mobile'=>'',
                        'donor_city'=>'', 'donor_bloodgroup'=>'','dob'=>''];
    if ($_POST) {
      $posted_values = posted_values($_POST);
      $validation->check($_POST, [
        'donor_fname' => [
          'display' => 'First Name',
          'required' => true
        ],
        'donor_lname' => [
          'display' => 'Last Name',
          'required' => true
        ],

        'nic' => [
          'display' => 'National Identity Card Number',
          'required' => true ,
          'unique' => 'donor',
          'min' => 6,
          'max' => 150

        ],
        'donor_email' => [
          'display' => 'Email',
          'required' => true ,
          'unique' => 'donor',
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
      // dnd($_POST);
      if ($validation->passed()) {
        $newUser = new Donor();
        $newUser->registerNewUser($_POST);
        $newUser->login();
        Router::redirect('donor/login');

      }
    }
    $this->view->post = $posted_values;
    $this->view->displayErrors = $validation->displayErrors();
    $this->view->render('donor/register');

  }

  // Account profile
  // public function profileAction(){

  //   $contact = $this->DonorModel->findById(currentUser()->id);

  // $this->view->render('donor/details');
  // }


  public function detailsAction(){
    // $validation = new Validate();
    // $posted_values = ['donor_name'=>'', 'password'=>'' ];
    // if ($_POST) {
    //   $posted_values = posted_values($_POST);
    //   $validation->check($_POST, [
    //     'donor_name' => [
    //       'display' => 'Donor Name',
    //       'max' => 3
    //     ],
    //
    //   ]);
    //   if ($validation->passed()) {
    //     $this->DonorModel->update(currentUser()->id,$posted_values);
    //     Router::redirect('donor/details');
    //
    //   }
    // }
      //$donorData = $this->DonorModel->findById(currentUser()->id);
      $donorData = currentUser();
      //$this->view->displayErrors = $validation->displayErrors();
      // dnd(cu);
      $this->view->contact =  $donorData;
      $this->view->render('donor/details');
  }

  //  Account edit
  public function edit_profileAction(){
    $validation = new Validate();
    $posted_values = ['donor_name'=>'', 'password'=>'','donor_email'=>'' ];
    if ($_POST) {
      $posted_values = posted_values($_POST);
      $validation->check($_POST, [
        'donor_name' => [
          'display' => 'First Name',
          'required' => true
        ],
        // 'password' => [
        //   'display' => 'Password',
        //   'required' => true ,
        //   'min' => 6,
        // ],
        'donor_email' => [
          'display' => 'Email',
          'required' => true ,
          'unique' => 'donor',
          'max' => 150,
          'valid_email' => true
        ]
      ],false);

      if ($validation->passed()) {
        $updateFields = $_POST;
        $this->DonorModel->update(currentUser()->id,$updateFields);
        Router::redirect('donor/details');

      }
    }
    $this->view->post = $posted_values;
    $this->view->displayErrors = $validation->displayErrors();

    $this->view->render('donor/edit_profile');
  }
}
