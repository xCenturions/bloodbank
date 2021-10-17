<?php

class HomeController extends Controller
{
  public function __construct($controller, $action)
  {
    parent::__construct($controller, $action);
  }

  public function indexAction()
  {
    $bank = '';
    if (isset(staff()->assigned)) {
      $bank = staff()->assigned;
    } elseif (isset(admin()->assigned)) {
      $bank = admin()->assigned;
    }



    $stockModel = new Stock();
    $alertModel = new Alerts();
    $patientModel = new Patient();
    $donorModel = new Donor();
    $staffModel = new Staff();


    $stockModel->bloodAlert($bank);

    // if(isset(staff()){
    $alerts = $alertModel->getAllAlerts($bank);


    if (!empty($alerts) && $alerts[0]->status == 'unopened') {
      $this->view->alert = $alerts[0];


      // dnd($alerts[0]) ;
    }

    $patient = $patientModel->countPatientsBank($bank);
    $staff = $staffModel->countStaff($bank);



    $donors = $donorModel->countDonors();
    $donationModel = new Donation();

    $count = $donationModel->countRecords($bank);
    $countBank = $donationModel->countRecordsBank($bank);

    //  dnd($patient);
    $this->view->total = $count[0]->total;
    $this->view->staff = $staff[0]->total;
    $this->view->donors = $donors[0]->count;
    $this->view->patients = $patient[0]->total;
    $this->view->totalBank = $countBank[0]->total;



    $this->view->render('home/index');
  }


  public function loginAction()
  {


    $this->view->render('home/login');
  }

  public function testAction()
  {

    $this->view->render('home/test');
  }



  public function contactusAction()
  {

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
          'required' => true,
          'valid_email' => true

        ]

      ]);
      if ($validation->passed()) {

        $contact = new ContactUs();

        $contact->addMessage($_POST);
      }
    }

    $this->view->displayErrors = $validation->displayErrors();

    $this->view->render('home/contactus');
  }

  public function thankyouAction()
  {
    $this->view->render('home/thankyou');
  }
  public function mailSentAction()
  {
    $mail = base64_decode($_GET['email']);
    $this->view->email = $mail;
    $this->view->render('home/mailSent');
  }

  public function successAction()
  {
    $this->view->render('home/success');
  }


  public function requestBloodCampAction()

  {

    $this->view->render('home/requestBloodCamp');
  }

  public function requestAction()
  {

    //dnd($_POST);
    if ($_POST) {

      $validation = new Validate();


      if ($_POST) {

        //dnd($_POST);       
        $validation->check($_POST, [

          'name' => [
            'display' => 'Patient Name',
            'required' => true

          ],

          'nic' => [
            'display' => 'National Identity Card Number',
            'required' => true,
            'valid_nic' => true

          ],
          'mobile' => [
            'display' => 'Mobile Number',
            'required' => true,
            'valid_mobile' => true
          ],
          'nst_bank' => [
            'display' => 'Nearest Blood Bank',
            'required' => true

          ],
          'email' => [
            'display' => 'Email',
            'required' => true,
            'valid_email' => true

          ],
          'location' => [
            'display' => 'Venue',
            'required' => true


          ]

        ]);


        if ($validation->passed()) {
          $campModel = new Camp();
          $campModel->date = date('Y-m-d');
          $campModel->requestCamp($_POST);
          echo (1);
        } else {
          echo ($validation->displayErrors());
        }
      }
    }
  }
}
