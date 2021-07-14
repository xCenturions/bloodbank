<?php

class AppoController extends Controller{

  public function __construct($controller, $action)
  {
    parent::__construct($controller,$action);
    $this->view->setLayout('default');
    $this->load_model('Appo');
  }

  public function indexAction()
  {
     $appoint = $this->AppoModel->findAllByDonorId(currentUser()->id);
     $this->view->appoint = $appoint;
    $this->view->render('appo/index');
  }


    public function makeAppoAction()
    {
      $appoint = new Appo();
      $validation = new Validate();
      if ($_POST) {
        $appoint->assign($_POST);
        $validation->check($_POST, Appo::$addValidation,true);
        if ($validation->passed()) {
          $appoint->donor_id = currentUser()->id;;
          $appoint->save();
          Router::redirect('appo');
        }

      }
      $this->view->appoint = $appoint;
      $this->view->displayErrors = $validation->displayErrors();
      // $this->view->postAction = PROOT . 'contacts' . DS . '';
      $this->view->render('appo/makeAppo');
    }

    public function deleteAction($id)
    {
      $appoint = $this->AppoModel->findByIdAndDonorId($id,currentUser()->id);
      //dnd($appoint);
      if ($appoint) {
        $appoint->delete();
      }
      Router::redirect('appo');
    }

}
