<?php

      use BaconQrCode\Renderer\ImageRenderer;
      use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
      use BaconQrCode\Renderer\RendererStyle\RendererStyle;
      use BaconQrCode\Writer;

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
            if($user->is_active == 'confirm'){

                   $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
            $user->login($remember);
            Router::redirect('');

            }else{
               $validation->addError("Your Account in not verified");
            }
           
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
        ],

        'donor_mobile' => [
          'display' => 'Donor Mobile',
          'required' => true ,
          'valid_mobile' => true,
        ],

        'dob' => [
          'display' => 'Donor Age',
          'required' => true ,
          'valid_age' => true,
        ]


      ],true);


      // dnd($_POST);
      if ($validation->passed()) {
        $newUser = new Donor();
        $newUser->verification_code = getToken(32);
        $newUser->is_active = 'unverified';
        //dnd($newUser->verification_code);

       
        $newUser->registerNewUser($_POST);
        $newUser->verification($newUser->donor_email,$newUser->verification_code,$newUser->donor_fname);
        //$newUser->login();
        Router::redirect('donor/login');

      }
    }

    $cities = $this->DonorModel->getAllCities();
    $this->view->cities = $cities;
    // dnd($validation);
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
    
   
      $donorData = currentUser();
     //dnd($donorData);
      $donationModel = new Donation();
      $donation = $donationModel->findDonorById(currentUser()->id);
      $map = $this->DonorModel->findDonorMapData(currentUser()->donor_city);
      
      //dnd($donation);
     
      $this->view->donor =  $map;
      $this->view->donation = $donation;
     
      $this->view->render('donor/details');
  }

 
  



  //  Account edit
  public function edit_profileAction($id){

    if($id == currentUser()->id){

    $donor = $this->DonorModel->findDonorById($id);
    
    $validation = new Validate();
  
    if ($_POST) {
     
      $validation->check($_POST, [
        'donor_fname' => [
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
    }else{
     Router::redirect('Restricted');
    }
    $this->view->donor = $donor;
   // $this->view->postAction = PROOT . 'donor' . DS . 'edit_profile' . DS . currentUser()->id;
    $this->view->displayErrors = $validation->displayErrors();

    $this->view->render('donor/edit_profile');
  }


    //qrcode

  public function qrcodeAction($id)
  {
    

    $renderer = new ImageRenderer(
        new RendererStyle(400),
        new ImagickImageBackEnd()
    );
   // $details = new Donor();
    $details = $this->DonorModel->findDonorById($id);
     
    $details = 'Donor Name : ' . $details->donor_fname . ' ' . $details->donor_lname . "<br />" . ' ' . 'Donor NIC : ' . $details->nic . "<br />" ;
    // $details .= 
    // $details .= 'Donor Mobile Number  : ' . $details->donor_mobile;
  //dnd($details);
   
      $writer = new Writer($renderer);

      $qr_image = base64_encode($writer->writeString($details));
      $this->view->qr_image = $qr_image;

      $this->view->render('donor/qrcode');


  }


  ///////////////email verifivation

  public function verifyAction(){

     $id = $_GET['id'];
    $hash = $_GET['hash'];

    
    
   // $donor = $donorModel->findId($id);
    $donor = $this->DonorModel->verify($id);
 
    
    if($donor[0]->verification_code == $hash){
     

        if($donor[0]->is_active == "unverified"){
          
          $donor[0]->is_active = "confirm";
           $this->DonorModel->update($id, $donor[0]);
           


        }
    }
  
  $this->view->render('donor/verify');

  }


  ///////////contact us

  public function contactusAction(){
     
    $validation = new Validate();

      if ($_POST) {
     
      $validation->check($_POST, [
        'name' => [
          'display' => 'Name',
          'required' => true
        ],
        'message' => [
          'display' => 'Message ',
          'required' => true
        ],

        'email' => [
          'display' => 'Email',
          'required'=> true,
          'valid_email' =>true
          
        ]
      
      ]);

    }

      if ($validation->passed()) {

    $contact = new ContactUs();

     $contact->addMessage($_POST);
      }
      
      $this->view->displayErrors = $validation->displayErrors();
    
    $this->view->render('donor/contactus');
  }
}
