<?php

 class HomeController extends Controller {
   public function __construct($controller, $action){
     parent::__construct($controller, $action);
   }

   public function indexAction(){


//dnd(staff());
     $this->view->render('home/index');
   }

   
   public function loginAction(){


     $this->view->render('home/login');
   }



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
         if ($validation->passed()) {

    $contact = new ContactUs();

     $contact->addMessage($_POST);
      }

    }
 
      $this->view->displayErrors = $validation->displayErrors();
    
    $this->view->render('home/contactus');
  }

   public function thankyouAction(){
     $this->view->render('home/thankyou');
  }

   public function successAction(){
     $this->view->render('home/success');
  }

 }
