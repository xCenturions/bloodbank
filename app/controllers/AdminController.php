<?php

class AdminController extends Controller{

  public function __construct($controller, $action)
    {
      parent::__construct($controller, $action);
      $this->load_model('Admin');
      $this->view->setLayout('default');
    }

    public function indexAction()
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
     
             $user = $this->AdminModel->findByUsername($_POST['username']);
            
        //   }

          if ($user && Input::get('password') == $user->password) {
            $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
            $user->login($remember);
            Router::redirect('');
          }else {
            $validation->addError("There is an error with your User Name or Password");
          }
        }
      }

      $this->view->displayErrors = $validation->displayErrors();

      $this->view->render('admin/index');

    }

     public function logoutAction()
  {
    if(admin()) {
        admin()->logout();
    }
    Router::redirect('admin/index');
  }


}