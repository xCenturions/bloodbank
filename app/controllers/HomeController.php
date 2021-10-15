<?php

class HomeController extends Controller
{
  public function __construct($controller, $action)
  {
    parent::__construct($controller, $action);
  }

  public function indexAction()
  {

    $stockModel = new Stock();
    $alertModel = new Alerts();

    $bank = 'Jaffna';
    $stockModel->bloodAlert();

    // if(isset(staff()){
    $alerts = $alertModel->getAllAlerts($bank);


    if (!empty($alerts) && $alerts[0]->status == 'unopened') {
      $this->view->alert = $alerts[0];
      // dnd($alerts[0]) ;
    }








    //dnd($alerts);



    // }




    //dnd(staff());
    $this->view->render('home/index');
  }


  public function loginAction()
  {


    $this->view->render('home/login');
  }

  public function testAction()
  {
    $bank = staff()->assigned;
    $donationModel = new Donation();

    $count = $donationModel->countRecords();
    $countBank = $donationModel->countRecordsBank($bank);

    //dnd($count);
    $this->view->total = $count[0]->total;
    $this->view->totalBank = $count[0]->total;
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
}
