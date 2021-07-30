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
    //dnd($data);
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

   public function bloodStockReportAction(){


     $donationModel = new Donation('stock');
     $stock =  $donationModel->piechart(); 
     $donate = $donationModel->barchart();
      
  //
      
   $this->view->result = $stock;
   $this->view->results = $donate;
    
   //dnd( $donate);

       $this->view->render('staff/bloodStockReport');
  }

  public function bloodStockDetailsAction(){


     $stockModel = new Stock();
     $stock =  $stockModel->getAllFromStock(); 
      
  //dnd( $stock);
      
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
                $stock->donor_id = $donor->id;
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






}
