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
    // dnd($appoint);
     $this->view->appoint = $appoint;
    $this->view->render('appo/index');
  }


  public function makeAppoAction()
  {
    $appoint = new Appo();
   $validation = new Validate();
    if ($_POST) {
      $appoint->assign($_POST);
     //dnd($_POST);
      $validation->check($_POST, Appo::$addValidation,true);
      if ($validation->passed()) {
        $appoint->donor_id = currentUser()->id;;
        $appoint->save();
        Router::redirect('appo');
      }

    }
    $locationModel = new Location('location');
     $locations =  $locationModel->getAllLocations();
    $this->view->locations = $locations;
  //dnd($locations);
    $this->view->location_types = $locationModel->getAllTypes();
   //dnd($this->view->location_types);
    foreach($locationModel->getAllTypes() as $values){
     //dnd($this->appoint->type);
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


 


  // Return location according to type
  public function getLocationAction(){
     $output ='<option value="" disabled="" selected="">Find Nearest Location</option>';
    // dnd($_GET["typeID"]);
      $typeId = $_GET["typeID"];
      $locationModel = new Location('location');
      $locations =  $locationModel->findAllByTypeId((int)$typeId);
      // dnd($locations);
      foreach($locations as $value){
        $output .='<option value="'.$value->nearest_location.'">' .$value->nearest_location. '</option>';
      }
      echo($output);
	  
  }



}

