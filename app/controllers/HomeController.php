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
 }
