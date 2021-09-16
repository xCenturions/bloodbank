<?php 
  use BaconQrCode\Renderer\ImageRenderer;
      use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
      use BaconQrCode\Renderer\RendererStyle\RendererStyle;
      use BaconQrCode\Writer;
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
    //$id = '973533576V';
    $check = $donorModel->findDonorById($id);

    if($check->form == 'submitted'){
    $data = $donorModel->findDonorData($id);
    $map = $donorModel->findDonorMapData($data[0]->donor_city);
     $this->view->data = $data[0];
    }else{
       
       $map = $donorModel->findDonorMapData($check->donor_city);
       $this->view->data = $check;
    }
     $donationModel = new Donation();
      $donation = $donationModel->findDonorById($id);
     
      
      
     // dnd($data);
     
      $this->view->donor =  $map;
      $this->view->donation = $donation;
    
    
   
    
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
    $formModel = new Form();
    $formData = $formModel->getDonorData($id);
    $donor = $donorModel->findDonorById($id);
    $staff= staff();
//dnd($donor);
 $renderer = new ImageRenderer(
        new RendererStyle(400),
        new ImagickImageBackEnd()
    );
   // $details = new Donor();
   
     
    $details = 'Donor Name : ' . $donor->donor_name .  "<br />" . ' ' . 'Donor NIC : ' . $donor->nic . "<br />" ;
    // $details .= 
    // $details .= 'Donor Mobile Number  : ' . $details->donor_mobile;
  //dnd($details);
   
      $writer = new Writer($renderer);

      $qr_image = base64_encode($writer->writeString($details));
      $this->view->qr_image = $qr_image;

   //dnd($_POST);
     
    if ($_POST) {
      
        // form validation
        $validation->check($_POST, [

           'din_name' => [
            'display' => "DIN Name",
            'required' => true
          ],
          'mo_name' => [
            'display' => "Medical Officer's name",
            'required' => true
          ],

          'weight' => [
            'display' => 'Weight',
            'required' => true
          ],
          'donor_name' => [
            'display' => "Donor's Name",
            'required' => true
          ],
          'of_name' => [
            'display' => "Officer's name",
            'required' => true
          ],
          'ph_name' => [
            'display' => "Phlebotomist's name",
            'required' => true
          ],



        ],false);

         if($validation->passed()) {
          
          // $stock = new Stock();
          // $stock->bld_grps = $donor->donor_bloodgroup;
          // $stock->donor_id = $donor->id;
          // $stock->addToStock($_POST);

           $donate = new Donation();
           $donate->donor_id = $donor->id;
           $donate->staff_id = staff()->id;
           $donate->date = date('Y-m-d');
           $donate->bld_grp = $formData->bloodgroup; ////chnage
           $donate->addToDonation($_POST);
         
        
            Router::redirect('staff/donorData/'.$donor->id);
          
          }

     

        
    }
       $this->view->donor = $donor;   
       $this->view->staff = $staff;           
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
     // dnd($stock);
  //
      
   $this->view->result = $stock;
   $this->view->results = $donate;
    
   //dnd( $donate);
      
       $this->view->render('staff/bloodStockReport');
  }


  public function bloodStockAction(){
    $stockModel = new Stock();
       
          $bank = $_POST['bld_bank'];
            $stock =  $stockModel->piechartBank($bank); 
          
            $this->view->data = $stock;

         echo json_encode($stock);
    
  }


  public function searchDonorsAction(){

  //  $allData = $this->StaffModel->findDonorWithMapData();
  //  $allData= json_encode($allData , true);
    $cities = $this->StaffModel->getAllCities();
    $this->view->cities = $cities;
   // $this->view->allData = $allData;
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


  public function searchLocationAction(){
     $output ='';
     $result = '';
    //dnd($_POST["donor_bloodgroup"]);
    
    //dnd($city);
    if(isset($_POST["donor_city"])){
      $donor_city = $_POST["donor_city"];
      //$blood = '';
     
      
      $city = $this->StaffModel->searchDonorsByCity($donor_city);
        //dnd($city);
      }elseif(isset($_POST["donor_bloodgroup"])){
        //$donor_city = '';
         $blood = $_POST["donor_bloodgroup"];
       $city = $this->StaffModel->findFromBlood($blood);
      //dnd($city);
    }elseif(isset($_POST["donor_city"]) && isset($_POST["donor_bloodgroup"])){
      $donor_city = $_POST["donor_city"];
       $blood = $_POST["donor_bloodgroup"];
          $city = $this->StaffModel->findFromBloodAndCity($blood,$donor_city);
          dnd($city);
    }
      else{
        $city = $this->StaffModel->findDonorWithMapData();
      }
     // $allData= json_encode($city, true);
   //  $allData - $city->
       //dnd($allData);
$all ="allData";
      // $output2= "<vdiv id=".$all."> ". $allData ." </div>";
      $class = "cell100 column2";
      //dnd($value);
      foreach($city as $v){
        
           $output .= '<table>
							<tbody>
                            
                                
								
                                   
                                        
                   <td class="cell100 column1"> '.$v->donor_name.'</td>                
									<td class="cell100 column2"> '.$v->nic.'</td>
									<td class="cell100 column3"> '.$v->donor_bloodgroup.'</td>
									<td class="cell100 column4"> '.$v->donor_city.'</td>
									<td class="cell100 column4"> '.$v->donor_mobile.'</td>
									<td class="cell100 column5"> <button type="button" class="btn btn-danger"><a style="color:white" href="'.PROOT.'staff/sendMessage?id='.$v->id.'&email='.$v->donor_email.'&name='.$v->donor_name.'">Send_Message</a></button></td>



								</tr>

								 
							</tbody>
						</table>';

            // /$result = 


      }
      // echo($output2);
    echo($output);
   
  }

public function allDonorsAction() {

  $output ='';
  $allData = $this->StaffModel->findDonorWithMapData();

   $allData= json_encode($allData, true);

      $output .=  '<div id="allData">'.$allData.'</div>' ;
        //dnd($output);
       echo($output);

}


public function sendMessageAction() {
    $data = [

      'id' =>  $_GET['id'],
      'email' => $_GET['email'],
      'name' => $_GET['name']

    ];
  //  dnd($data);
   
    //$email = $_GET[];
  //  dnd($data['id']);
   
    if($_POST){

      $message = $_POST['message'];
      $this->StaffModel->sendMessage($data['email'],$message,$data['name']);


     
    }else{
      //dnd('error');
    }
       $this->view->data = $data;

      $this->view->render('staff/sendMessage');
     
}

public function viewFormAction($id) {
  
   $formModel = new Form();
    $formData = $formModel->getDonorData($id);

    $this->view->data = $formData;
     $this->view->render('staff/viewForm');
}


public function staffProfileAction() {

  $staffData = staff();

  $this->view->staffData = $staffData;
   $this->view->render('staff/staffProfile');

}

public function editProfileAction($id = NULL) {

  if($id == NULL) {
    Router::redirect('');
  }else{

$validation = new Validate();
  $data = $this->StaffModel->findById($id);

  //dnd($_POST);
      if ($_POST) {


        
              
      $validation->check($_POST, [
        
        
      ],false);

      if ($validation->passed()) {
          $targetDir = "app/views/staff/pro_img/";
 
          $fileName = basename($_FILES["file"]["name"]);
          $file = explode('.', $fileName);
          $ext = $file[count($file)-1];
          //dnd($ext);
          $fileName = $data->username.'-'.hash('md5', $fileName). '.' . $ext;
          $fileName_ar = array('pro_img' => $fileName);
          //dnd($fileName_ar);
          $targetFilePath = $targetDir . $fileName;
          $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
         // dnd($fileType);
         
          $allowTypes = array('jpg','png','jpeg','gif','pdf');
             $updateFields = $_POST;

           if(!empty($_FILES["file"]["name"])) {
          if(in_array($fileType, $allowTypes)){ 
            
       

            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){

                 $updateFields = array_merge($_POST,$fileName_ar);

            }else{
                $validation->addError("File did not uploaded");
            }
              
            
                }else{
                  $validation->addError("Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.");
                }
              }
                  
       
        $this->StaffModel->update($id,$updateFields);
      //dnd($validation->displayErrors());
        Router::redirect('staff/staffProfile');


      
      }
        
      }


$this->view->displayErrors = $validation->displayErrors();

  $this->view->data = $data;
   $this->view->render('staff/editProfile');
    }

}




}
