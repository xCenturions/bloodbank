<?php


class SuperadminController extends Controller
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('Admin');
        $this->view->setLayout('default');
    }


    public function adminRegisterAction()
    {


        $bloodbanks = $this->AdminModel->getAllBloodbanks();

        $this->view->banks = $bloodbanks;


        $this->view->render('superadmin/adminRegister');
    }

    public function registerAction()
    {

        $validation = new Validate();

        //dnd($_POST);    
        if ($_POST) {

            $posted_values = posted_values($_POST);
            //dnd($_POST);       
            $validation->check($posted_values, [
                'name' => [
                    'display' => 'Name',
                    'required' => true

                ],

                'username' => [
                    'display' => 'Username',
                    'required' => true,
                    'unique' => 'admin',
                    'min' => 6,
                    'max' => 150

                ],
                'email' => [
                    'display' => 'Email',
                    'required' => true,
                    'unique' => 'admin',
                    'max' => 150,
                    'valid_email' => true
                ],

                'nic' => [
                    'display' => 'NIC',
                    'required' => true,
                    'valid_nic' => true
                ]

            ], false);


            if ($validation->passed()) {

                $newUser = new Admin();

                $pattern = " ";
                $firstPart = strstr(strtolower($posted_values['name']), $pattern, true);
                $secondPart = substr(strstr(strtolower($posted_values['name']), $pattern, false), 0, 3);
                $nrRand = rand(0, 100);

                $posted_values['password'] = trim($firstPart) . trim($secondPart) . trim($nrRand);
                //dnd( $posted_values['password']);

                //constructing email.


                $newUser->sendAccountDetails($posted_values['email'], $posted_values['name'], $posted_values['username'], $posted_values['password']);
                $newUser->registerAdmin($posted_values);
                // dnd($newUser->password);
                echo (1);
                //$newUser->login();

            } else {
                echo ($validation->displayErrors());
            }
        }







        /* This is an invalid ID number because 499 here is not indicating a valid
birth date */
    }
}
