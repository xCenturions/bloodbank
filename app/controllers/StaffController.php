<?php

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class StaffController extends Controller
{

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
      ], true);
      if ($validation->passed()) {

        $user = $this->StaffModel->findByUsername($_POST['username']);

        //   }

        if ($user && password_verify(Input::get('password'), $user->password)) {
          $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
          $user->login($remember);
          Router::redirect('staff/index');
        } else {
          $validation->addError("There is an error with your User Name or Password");
        }
      }
    }

    $this->view->displayErrors = $validation->displayErrors();

    $this->view->render('staff/login');
  }

  public function logoutAction()
  {
    if (staff()) {
      staff()->logout();
    }
    Router::redirect('');
  }

  public function donorDataAction($id)
  {
    $donorModel = new Donor();
    //$id = '973533576V';
    $check = $donorModel->findDonorById($id);

    if ($check->form == 'submitted') {
      $data = $donorModel->findDonorData($id);
      $map = $donorModel->findDonorMapData($data[0]->donor_city);
      $this->view->data = $data[0];
    } else {

      $map = $donorModel->findDonorMapData($check->donor_city);
      $this->view->data = $check;
    }
    $donationModel = new Donation();
    $donation = $donationModel->findDonorById($id);



    //dnd($data[0]);

    $this->view->donor =  $map;
    $this->view->donation = $donation;




    $this->view->render('staff/donorData');
  }





  //New Donation
  public function newDonationAction()
  {

    $validation = new Validate();

    if ($_POST) {

      // form validation
      $validation->check($_POST, [
        'nic' => [
          'display' => "nic",
          'required' => true


        ]
      ], true);
      if ($validation->passed()) {


        $donorModel = new Donor('donor');

        if ($donorModel->findByUsername($_POST['nic'])) {

          $user = $donorModel->findByUsername($_POST['nic']);
          Router::redirect('staff/donorData/' . $user->id);
        } else {

          $validation->addError("No donor found");
        }
      }
    }
    $this->view->displayErrors = $validation->displayErrors();

    $this->view->render('staff/newDonation');
  }


  /////blood add to the stock

  public function donateBloodAction($id)
  {

    $validation = new Validate();
    $donorModel = new Donor('donor');
    $formModel = new Form();
    $formData = $formModel->getDonorData($id);
    $donor = $donorModel->findDonorById($id);
    $staff = staff();
    //dnd($donor);
    $renderer = new ImageRenderer(
      new RendererStyle(400),
      new ImagickImageBackEnd()
    );
    // $details = new Donor();


    $details = 'Donor Name : ' . $donor->donor_name .  "<br />" . ' ' . 'Donor NIC : ' . $donor->nic . "<br />";
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
        'cm_no' => [
          'display' => "C.M number",
          'unique' => 'donation_record',
          'required' => true
        ]



      ], false);

      if ($validation->passed()) {

        // $stock = new Stock();
        // $stock->bld_grps = $donor->donor_bloodgroup;
        // $stock->donor_id = $donor->id;
        // $stock->addToStock($_POST);

        $donate = new Donation();
        $donate->donor_id = $donor->id;
        $donate->staff_id = staff()->id;
        $donate->location = staff()->assigned;
        $donate->status = 'unchecked';
        $donate->tested_diseases = 'Processing';
        $donate->date = date('Y-m-d');
        $donate->bld_grp = $formData->bloodgroup; ////chnage
        $donate->addToDonation($_POST);


        Router::redirect('staff/donorData/' . $donor->id);
      }
    }
    $this->view->donor = $donor;
    $this->view->staff = $staff;
    $this->view->displayErrors = $validation->displayErrors();
    $this->view->render('staff/donateBlood');
  }


  /////Blood stock Reports











  // public function bloodStockBarAction(){


  public function searchDonorsAction()
  {

    $cities = $this->StaffModel->getAllCities();

    $this->view->cities = $cities;
    //$this->view->allData = $allData;
    $this->view->render('staff/searchDonors');
  }


  /////////// add Patient

  public function patientRegisterAction()
  {

    $validation = new Validate();

    $bank = staff()->assigned;
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
          'required' => true,
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
        $newPatient->location = staff()->assigned;
        $newPatient->date = date('Y-m-d');
        $newPatient->register($_POST);

        $stockModel = new Stock();

        $stock =  $stockModel->findBloodAndBank($_POST['pt_bloodgroup'], $bank);
        // dnd($stock);
        $stockModel->delete($stock[0]->id);
        $stockModel->bloodAlert($bank);




        //$newUser->login();
        //Router::redirect('');
      }
    }

    $this->view->displayErrors = $validation->displayErrors();
    $this->view->render('staff/patientRegister');
  }

  public function registeredPatientsAction()
  {
    $this->view->render('staff/registeredPatients');
  }

  public function patientsAction()
  {

    $bank = staff()->assigned;

    $patientModel = new Patient();
    // $stock = $stockModel->getAllFromStock();

    $output = '';
    $result = '';

    if ((isset($_POST["nic"]) && $_POST['nic'] != '') && (isset($_POST["from_date"], $_POST['to_date']) && $_POST['to_date'] != '')) {



      $check = $patientModel->sortByNICAndDate($bank, $_POST["nic"], $_POST["from_date"], $_POST['to_date']);
      // dnd($donation);

    } elseif (isset($_POST["from_date"]) && $_POST['to_date']) {



      $check = $patientModel->sortByDate($_POST["from_date"], $_POST['to_date'], $bank);
      // dnd($stock);
    } elseif (isset($_POST["nic"]) && $_POST['nic'] != '') {
      //$nic = $_POST["nic"];
      $check = $patientModel->findByNIC($_POST["nic"], $bank);
      // dnd($donation);
      //
    } else {
      $check = $patientModel->getAllPatients($bank);
      //dnd($stock);
    }




    $all = "allData";

    $class = "cell100 column2";
    //dnd($value);
    if (empty($check)) {
      $output = "No records found";
    }

    foreach ($check as $v) {



      $output .= '<table>
    <tbody>


        <td class=""> ' . $v->pt_nic . '</a></td>
        <td class=" "> ' . $v->pt_name . '</td>
        <td> ' . $v->sex . '</td>
       
        <td class=" "> ' . $v->date . '</td>
        <td class=" "> ' . $v->pt_bloodgroup . '</td>
        





        </tr>


    </tbody>
</table>';
    }

    echo ($output);
  }


  ////////////////messages()

  public function messagesAction()
  {

    $contact = new ContactUs();

    $results = $contact->getAllMessages();
    // dnd($results[1]->name);

    $this->StaffModel->updateCol();

    $this->view->message = $results;

    $this->view->render('staff/messages');
  }


  public function searchLocationAction()
  {
    $output = '';
    $result = '';

    if ((isset($_POST["donor_city"]) && $_POST['donor_city'] != '') && (isset($_POST["donor_bloodgroup"])  && $_POST['donor_bloodgroup'] != '')) {
      $donor_city = $_POST["donor_city"];
      $blood = $_POST["donor_bloodgroup"];
      $city = $this->StaffModel->sortBy($blood, $donor_city);
    } elseif (isset($_POST["donor_city"]) && $_POST['donor_city'] != '') {
      $donor_city = $_POST["donor_city"];
      //$blood = '';


      $city = $this->StaffModel->searchDonorsByCity($donor_city);
      //dnd($city);
    } elseif (isset($_POST["donor_bloodgroup"]) && $_POST['donor_bloodgroup'] != '') {
      //$donor_city = '';
      $blood = $_POST["donor_bloodgroup"];
      $city = $this->StaffModel->findFromBlood($blood);
    } elseif (isset($_POST["nic"]) && $_POST['nic'] != '') {
      $nic = $_POST["nic"];
      $city = $this->StaffModel->searchByNameNic($nic);
      //
    } else {
      $city = $this->StaffModel->getAllDonors();
      //dnd($city);
    }



    $all = "allData";
    // $output2= "<vdiv id=".$all."> ". $allData ." </div>";
    $class = "cell100 column2";
    //dnd($value);
    if (empty($city)) {
      $output = "No records found";
    }

    foreach ($city as $v) {

      $output .= '<table>
							<tbody>
                            
                               
                   <td class="cell100 column1"> <a href="' . PROOT . 'staff/donorData/' . $v->id . '"> ' . $v->donor_name . '</a></td>                
									<td class="cell100 column2"> ' . $v->nic . '</td>
									<td class="cell100 column3"> ' . $v->donor_bloodgroup . '</td>
									<td class="cell100 column4"> ' . $v->donor_city . '</td>
									<td class="cell100 column4"> ' . $v->donor_mobile . '</td>
									<td class="cell100 column5"> <button id=' . $v->id . ' data-number=' . $v->id . ' type="button" data-toggle="modal" data-target="#centralModalDanger" onClick="send(this.id)" class="btn btn-danger">Send Message</button></td>



								</tr>

								 
							</tbody>
						</table>';

      // /$result = 


    }
    // echo($output2);
    echo ($output);
  }

  public function allDonorsAction()
  {


    $allData = $this->StaffModel->findDonorWithMapData();

    $allData = json_encode($allData, true);

    $output =   $allData;
    //dnd($output);
    echo ($output);
  }


  public function sendMessageAction()
  {

    $donorModel = new Donor();

    $donor = $donorModel->findById($_POST['donor_id']);

    //dnd($donor->donor_email);



    if (isset($_POST['message']) && $_POST['message'] != '') {

      $message = $_POST['message'];
      $this->StaffModel->sendMessage($donor->donor_email, $message, $donor->donor_name);
    }
    //$this->view->data = $data;

    //$this->view->render('staff/sendMessage');
  }



  public function viewFormAction($id)
  {

    $formModel = new Form();
    $formData = $formModel->getDonorData($id);

    $this->view->data = $formData;
    $this->view->render('staff/viewForm');
  }


  public function staffProfileAction()
  {

    $staffData = staff();

    $this->view->staffData = $staffData;
    $this->view->render('staff/staffProfile');
  }

  public function editProfileAction($id = NULL)
  {

    $id = base64_decode($id);

    if ($id == NULL) {
      Router::redirect('');
    } else {

      $validation = new Validate();
      $data = $this->StaffModel->findById($id);

      //dnd($_POST);
      if ($_POST) {




        $validation->check($_POST, [], false);

        if ($validation->passed()) {
          $targetDir = "app/views/staff/pro_img/";

          $fileName = basename($_FILES["file"]["name"]);
          $file = explode('.', $fileName);
          $ext = $file[count($file) - 1];
          //dnd($ext);
          $fileName = $data->username . '-' . hash('md5', $fileName) . '.' . $ext;
          $fileName_ar = array('pro_img' => $fileName);
          //dnd($fileName_ar);
          $targetFilePath = $targetDir . $fileName;
          $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
          // dnd($fileType);

          $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
          $updateFields = $_POST;

          if (!empty($_FILES["file"]["name"])) {
            if (in_array($fileType, $allowTypes)) {



              if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {

                $updateFields = array_merge($_POST, $fileName_ar);
              } else {
                $validation->addError("File did not uploaded");
              }
            } else {
              $validation->addError("Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.");
            }
          }


          $this->StaffModel->update($id, $updateFields);
          //dnd($validation->displayErrors());
          Router::redirect('staff/staffProfile');
        }
      }


      $this->view->displayErrors = $validation->displayErrors();

      $this->view->data = $data;
      $this->view->render('staff/editProfile');
    }
  }

  public function forgetPasswordAction()
  {
    $validation = new Validate();

    if ($_POST) {

      $validation->check($_POST, [

        'staff_email' => [
          'display' => 'Email',
          'not_exists' => 'staff',
          'valid_email' => true

        ]
      ], false);

      if ($validation->passed()) {

        $staff = $this->StaffModel->findByEmail($_POST['staff_email']);
        $staff->hash = getToken(32);
        // dnd($staff->id);
        $this->StaffModel->update($staff->id, $staff);
        $this->StaffModel->forgetPassword($_POST['staff_email'], $staff->hash, $staff->id);

        Router::redirect("home/mailSent?email=" . base64_encode($_POST['staff_email']) . "");
      }

      // $staff = $this->StaffModel->findbyEmail($_POST['email']);
    }
    $this->view->displayErrors = $validation->displayErrors();
    $this->view->render('staff/forgetPassword');
  }

  public function resetPasswordAction()
  {
    $id = $_GET['id'];
    $hash = $_GET['hash'];
    $staff = $this->StaffModel->findByID($id);
    $validation = new Validate();
    if ($hash == $staff->hash) {

      if ($_POST) {

        $validation->check($_POST, [

          'password' => [
            'display' => 'Password',
            'required' => true,
            'min' => 6,
          ],
          'confirm' => [
            'display' => 'nic',
            'required' => true,
            'matches' => 'password',
          ]
        ], false);

        if ($validation->passed()) {

          $staff->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
          $staff->hash = NULL;
          $this->StaffModel->update($staff->id, $staff);
        }
      }
    } else {
      $validation->addError("Something wrong! You can not Change Password Right Now. Please try again Later");
    }

    $this->view->displayErrors = $validation->displayErrors();
    $this->view->render('staff/resetPassword');
  }
  public function requestedCampsAction()
  {
    $this->view->render('staff/requestedCamps');
  }

  public function requestedAction()
  {
    $bank = staff()->assigned;

    $campModel = new Camp();
    // $stock = $stockModel->getAllFromStock();

    $output = '';
    $result = '';
    if (isset($_POST["from_date"]) && $_POST['to_date']) {



      $check = $campModel->sortByDate($bank, $_POST["from_date"], $_POST['to_date']);
      // dnd($stock);
    } else {
      $check = $campModel->getAllCamps($bank);
      //  dnd($check);
    }




    $all = "allData";

    $class = "cell100 column2";
    //dnd($value);
    if (empty($check)) {
      $output = "No records found";
    }

    foreach ($check as $v) {



      $output .= '<table>
    <tbody>


        <td class=""> ' . $v->location . '</a></td>
        <td class=" "> ' . $v->name . '</td>
        <td> ' . $v->email . '</td>
        <td class=" "> ' . $v->mobile . '</td>
        <td class=" "> ' . $v->date . '</td>
        <td class=" "> <button id="' . $v->id . '" type="button" data-toggle="modal" data-target="#centralModalSuccess" onClick="approve(this.id)" style="width:120px" class=" btn btn-rounded btn-success "><i class="fa fa-check" aria-hidden="true"></i>Approve</button> <button onClick="rejected(this.id)" id="' . $v->id . '" data-toggle="modal" data-target="#centralModalDanger" type="button" style="width:120px" class="c btn btn-rounded btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></i> Reject</button></td>
        





        </tr>


    </tbody>
</table>';
    }

    echo ($output);
  }

  public function approveAction()
  {
    //dnd($_POST['c_id']);
    if (isset($_POST['c_id']) && $_POST['c_id'] != '') {


      $campModel = new Camp();

      $camp = $campModel->findById($_POST['c_id']);
      //dnd($donor[0]->status);

      echo json_encode($camp);
      exit;
    }
  }

  public function approvedAction()
  {
    //dnd($_POST['c_id']);
    if (isset($_POST['date']) && $_POST['date'] != '') {

      $campModel = new Camp();

      $camp = $campModel->findById($_POST['c_id']);


      $locationModel = new Location();

      $locationModel->cid = 2;
      //dnd($_POST);

      $locationModel->addCamp($_POST);
      $camp->status = 'approved';
      $campModel->update($camp->id, $camp);
      echo (1);

      //dnd($donor[0]->status);


    }
  }
  public function rejectAction()
  {
    //dnd($_POST['c_id']);
    if (isset($_POST['id']) && $_POST['id'] != '') {

      $campModel = new Camp();

      $camp = $campModel->findById($_POST['id']);



      $camp->status = 'rejected';
      $campModel->update($camp->id, $camp);
      echo (1);
    }
    //dnd($donor[0]->status);


  }
}
