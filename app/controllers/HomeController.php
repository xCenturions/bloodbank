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
    $adminModel = new Admin();



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

    $allDonations = $donationModel->countAll();
    $totalBanks = $adminModel->allBanks();
    $totalAdmin = $adminModel->countAdmin();
    //dnd($totalAdmin);
    $this->view->total = $count[0]->total;
    $this->view->all = $allDonations[0]->total;
    $this->view->staff = $staff[0]->total;
    $this->view->donors = $donors[0]->count;
    $this->view->patients = $patient[0]->total;
    $this->view->totalBank = $countBank[0]->total;
    $this->view->allBanks = $totalBanks[0]->total;
    $this->view->allAdmin = $totalAdmin[0]->total;



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
  public function aboutusAction()
  {

    $this->view->render('home/aboutus');
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
  public function allBloodCampsAction()
  {
    $this->view->render('home/allBloodCamps');
  }
  public function allCampsAction()
  {





    $campModel = new Location();
    // $stock = $stockModel->getAllFromStock();

    $output = '';
    $result = '';

    if ((isset($_POST["city"]) && $_POST['city'] != '') && (isset($_POST["from_date"], $_POST['to_date']) && $_POST['to_date'] != '')) {



      $check = $campModel->sortByCItyAndDate($_POST["city"], $_POST["from_date"], $_POST['to_date']);
      // dnd($donation);

    } elseif (isset($_POST["from_date"]) && $_POST['to_date']) {



      $check = $campModel->sortByDate($_POST["from_date"], $_POST['to_date']);
      // dnd($stock);
    } elseif (isset($_POST["city"]) && $_POST['city'] != '') {
      //$donor_city = '';

      $check = $campModel->findFromCity($_POST["city"]);
      // dnd($donation);

    } else {
      $check = $campModel->getAllCamps();
      //dnd($stock);
    }




    $all = "allData";

    $class = "cell100 column2";
    //dnd($value);
    if (empty($check)) {
      $output = "No records found";
    }

    foreach ($check as $v) {



      $output .= '<table>
    <tbody>


        <td class=""> ' . $v->nearest_location . '</a></td>
        <td class=" "> ' . $v->city . '</td>
        <td> ' . $v->date . '</td>
        <td class=" "> ' . $v->time . '</td>
        





        </tr>


    </tbody>
</table>';
    }

    echo ($output);
  }



  public function requestBloodCampAction()

  {
    $donorModel = new Donor();

    $cities = $donorModel->getAllCities();
    $bank = $donorModel->getallbloodbanks();

    $this->view->cities = $cities;


    $this->view->bloodbank = $bank;
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
            'display' => 'Location',
            'required' => true


          ],

          'city' => [
            'display' => 'Nearest City',
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

  public function nearestBloodbankAction()
  {

    $donorModel = new Donor();

    $blood = $donorModel->getAllBloodbanks();

    $this->view->cluster = $blood;
    $this->view->render('home/nearestbloodbank');
  }


  public function findAction()
  {

    $donorModel = new Donor();
    // $stock =  $stockModel->getAllFromStock(); 

    $output = '';
    $result = '';

    if (isset($_POST["cluster"]) && $_POST['cluster'] != '') {
      $banks = $_POST["cluster"];
      // $blood = $_POST["bld_grps"];
      $stock = $donorModel->sortCluster($banks);
    } elseif (isset($_POST["name"]) && $_POST['name'] != '') {
      $nic = $_POST["name"];
      $stock = $donorModel->searchByName($nic);
      //
    } else {
      $stock =  $donorModel->getAllBloodbanks();
      //dnd($city);
    }




    $all = "allData";

    $class = "cell100 column2";
    //dnd($value);
    if (empty($stock)) {
      $output = "No records found";
    }

    foreach ($stock as $v) {



      $output .= '<table>
              <tbody>


                  <td class="cell100 column1"> <a href="' . PROOT . 'admin/adminProfile/' . $v->id . '"> ' . $v->name . '</a></td>                
                  <td class="cell100 column2"> ' . $v->nic . '</td>
                  <td class="cell100 column3"> ' . $v->email . '</td>
                  <td class="cell100 column4"> ' . $v->assigned . '</td>
                  <td class="cell100 column5"> ' . $v->mobile . '</td>
                  
                  



                </tr>

                 
              </tbody>
            </table>';
    }

    echo ($output);
  }
}
