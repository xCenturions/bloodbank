<?php
  class DepartmentsController extends Controller {

    public function __construct($controller, $action){
      parent::__construct($controller, $action);
      $this->view->setLayout('default');
    }

    public function indexAction(){
      $this->view->render('departments/index');
    }

    // public function firstAction(){
    //   $this->view->render('tools/first');
    // }
    //
    // public function secondAction(){
    //   $this->view->render('tools/second');
    // }
    //
    // public function thirdAction(){
    //   $this->view->render('tools/third');
    // }
  }
