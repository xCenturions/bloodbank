<?php 

class StaffController extends Controller{

  public function __construct($controller, $action)
    {
      parent::__construct($controller, $action);
      $this->load_model('Staff');
      $this->view->setLayout('default');
    }

 public function indexAction()
  {
     
    $this->view->render('staff/index');
  }

 public function loginAction()
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
     
             $user = $this->StaffModel->findByUsername($_POST['username']);
             
        //   }

          if ($user && password_verify(Input::get('password'), $user->password)) {
            $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
            $user->login($remember);
            Router::redirect('staff/index');
          }else {
            $validation->addError("There is an error with your User Name or Password");
          }
        }
      }

      $this->view->displayErrors = $validation->displayErrors();

      $this->view->render('staff/login');

    }

  public function logoutAction()
  {
    if(staff()) {
        staff()->logout();
    }
    Router::redirect('');
  }

   public function donorDataAction($id)
  {
    $donorModel = new Donor();
    
    $data = $donorModel->findDonorById($id);
    $map = $donorModel->findDonorMapData($data->donor_city);
    
     $donationModel = new Donation();
      $donation = $donationModel->findDonorById($id);
     
      
      
      //dnd($donation);
     
      $this->view->donor =  $map;
      $this->view->donation = $donation;
    
    
    $this->view->data = $data;
    
    $this->view->render('staff/donorData');
  }

  
  public function donorDetailsAction(){


     $donorModel = new Donor('donor');
     $donor =  $donorModel->getAllDonors(); 
      
  //dnd( $donor);
      
   $this->view->donor = $donor;
    
   
       $this->view->render('staff/donorDetails');
  }


//New Donation
  public function newDonationAction(){
 
      $validation = new Validate();

      if ($_POST) {
        
        // form validation
        $validation->check($_POST, [
          'nic' => [
            'display' => "nic",
            'required' => true
         
            
          ]
        ],true);
         if ($validation->passed()) {
          

            $donorModel = new Donor('donor');

            if($donorModel->findByUsername($_POST['nic'])) {
     
             $user = $donorModel->findByUsername($_POST['nic']);
               Router::redirect('staff/donorData/'.$user->id);
            
            }else{

              $validation->addError("No donor found");
            }

         }
      }
      $this->view->displayErrors = $validation->displayErrors();

      $this->view->render('staff/newDonation');

    
  }


  /////blood add to the stock

  public function donateBloodAction($id){
    
    $validation = new Validate();
    $donorModel = new Donor('donor');
    $donor = $donorModel->findDonorById($id);
//dnd($donor);

   
     
    if ($_POST) {
      
        // form validation
        $validation->check($_POST, [
          
          
        ],false);

         if($validation->passed()) {
          
          // $stock = new Stock();
          // $stock->bld_grps = $donor->donor_bloodgroup;
          // $stock->donor_id = $donor->id;
          // $stock->addToStock($_POST);

           $donate = new Donation('stock');
           $donate->donor_id = $donor->id;
           $donate->date = date('Y-m-d');
           $donate->bld_grp = $donor->donor_bloodgroup;
           $donate->addToDonation($_POST);
         
        
            Router::redirect('staff/donorData/'.$donor->id);
          
          }

     

        
    }
       $this->view->donor = $donor;              
      $this->view->displayErrors = $validation->displayErrors();
      $this->view->render('staff/donateBlood');

  }


  /////Blood stock Reports

   public function bloodDonationReportAction(){


     $donationModel = new Donation('stock');
     $stock =  $donationModel->piechart(); 
     $donate = $donationModel->barchart();
      
  //
      
   $this->view->result = $stock;
   $this->view->results = $donate;
    
   //dnd( $donate);

       $this->view->render('staff/bloodDonationReport');
  }

  public function bloodStockDetailsAction(){


     $stockModel = new Stock();
     $stock =  $stockModel->getAllFromStock(); 
      
 
      
   $this->view->stock = $stock;
    
   
       $this->view->render('staff/bloodStockDetails');
  }




   public function addBloodToStockAction(){
    
    $validation = new Validate();
     $donorModel = new Donor();
  
//dnd($donor);

   
     
    if ($_POST) {
     // dnd($_POST);
        // form validation
        $validation->check($_POST, [
           'nic' => [
            'display' => "nic",
            'required' => true
         
            
          ]
          
        ],false);

         if($validation->passed()) {

          
           

            if($donorModel->findByUsername($_POST['nic'])) {
     
             $donor = $donorModel->findByUsername($_POST['nic']);
              
                $stock = new Stock();
                $stock->bld_grps = $donor->donor_bloodgroup;
              
                $stock->donor_nic = $donor->nic;
                $stock->addToStock($_POST);

            Router::redirect('staff/donorData/'.$donor->id);
               
            
            }else{

              $validation->addError("No donor found");
            }
         
          
          }


        
    }
             
      $this->view->displayErrors = $validation->displayErrors();
      $this->view->render('staff/addBloodToStock');

  }

  
public function bloodStockReportAction(){


     $stockModel = new Stock();
     $stock =  $stockModel->piechart(); 
     $donate = $stockModel->barchart();
      
  //
      
   $this->view->result = $stock;
   $this->view->results = $donate;
    
   //dnd( $donate);

       $this->view->render('staff/bloodStockReport');
  }


  public function searchDonorsAction(){

    if(!$_POST){
     $allData = $this->StaffModel->findDonorWithMapData();
    // dnd($allData);

}else{

     $donor_city = $_POST['donor_city']  ;
     

      $allData = $this->StaffModel->searchDonorsByCity($donor_city);
      
}

    $cities = $this->StaffModel->getAllCities();
    $this->view->cities = $cities;
    $this->view->allData = $allData;
    $this->view->render('staff/searchDonors');
  }


  /////////// add Patient

public function patientRegisterAction(){

   $validation = new Validate();
  
                  
    if ($_POST) {
     
      //dnd($_POST);       
      $validation->check($_POST, [

       'pt_name' => [
          'display' => 'Patient Name',
          'required' => true
        
        ],

        'pt_nic' => [
          'display' => 'National Identity Card Number',
          'required' => true

        ],
        'pt_mobile' => [
          'display' => 'Mobile Number',
          'required' => true ,
          'valid_mobile' => true
        ],
        'pt_city' => [
          'display' => 'City',
          'required' => true 
        
        ],
        'dob' => [
          'display' => 'Date of Birth',
          'required' => true 
          
        ],
        'qty' => [
          'display' => 'Blood Quantity',
          'required' => true 
          
        ],
        'sex' => [
          'display' => 'Sex',
          'required' => true 
          
          ]




      ]);
       
     
      if ($validation->passed()) {
        $newPatient = new Patient();
        $newPatient->register($_POST);
       
        //$newUser->login();
        Router::redirect('');

      }
    }
    
    $this->view->displayErrors = $validation->displayErrors();
    $this->view->render('staff/patientRegister');
  }


////////////////messages()

public function messagesAction() {

  $contact = new ContactUs();

  $results = $contact->getAllMessages();
 // dnd($results[1]->name);

  $this->StaffModel->updateCol();

 $this->view->messages = $results;

    $this->view->render('staff/messages');

}




}
