<?php

 class HomeController extends Controller {
   public function __construct($controller, $action){
     parent::__construct($controller, $action);
   }

   public function indexAction(){
dnd(admin());

     $this->view->render('home/index');
   }
 }
