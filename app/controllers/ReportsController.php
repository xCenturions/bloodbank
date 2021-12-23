  <?php

  class ReportsController extends Controller
  {

    public function __construct($controller, $action)
    {
      parent::__construct($controller, $action);
      $this->load_model('Staff');
      $this->view->setLayout('default');
    }

    public function bloodDonationDetailsAction()
    {


      $donationModel = new Donation();
      $stock =  $donationModel->piechart();
      $donate = $donationModel->barchart();


      //
      $banks = $this->StaffModel->getAllBloodBanks();
      $this->view->banks = $banks;
      $this->view->result = $stock;
      $this->view->results = $donate;



      $this->view->render('reports/bloodDonationDetails');
    }

    public function donationDetailsAction()
    {



      $donationModel = new Donation();
      // $stock =  $stockModel->getAllFromStock(); 

      $output = '';
      $result = '';

      if ((isset($_POST["bld_banks"]) && $_POST['bld_banks'] != '') && (isset($_POST["from_date"], $_POST['to_date']) && $_POST['to_date'] != '')) {
        $banks = $_POST["bld_banks"];


        $donation = $donationModel->sortByBldAndDate($banks, $_POST["from_date"], $_POST['to_date']);
        // dnd($donation);

      } elseif (isset($_POST["from_date"]) && $_POST['to_date']) {



        $donation = $donationModel->sortByDate($_POST["from_date"], $_POST['to_date']);
        // dnd($stock);
      } elseif (isset($_POST["bld_banks"]) && $_POST['bld_banks'] != '') {
        //$donor_city = '';
        $bank = $_POST["bld_banks"];
        $donation = $donationModel->findFromBank($bank);
        //    dnd($donation);

      } elseif (isset($_POST["nic"]) && $_POST['nic'] != '') {
        $nic = $_POST["nic"];
        $donation = $donationModel->findFromNic($nic);
        // dnd($donation);
        //
      } else {
        $donation =  $donationModel->getAllDonations();
        //dnd($stock);
      }




      $all = "allData";

      $class = "cell100 column2";
      //dnd($value);
      if (empty($donation)) {
        $output = "No records found";
      }

      foreach ($donation as $v) {



        $output .= '<table>
							<tbody>


                  <td class="cell100 column1"> <a href="' . PROOT . 'staff/donorData/' . $v->id . '"> ' . $v->donor_name . '</a></td>                
									<td class="cell100 column2"> ' . $v->nic . '</td>
									<td class="cell100 column3"> ' . $v->location . '</td>
									<td class="cell100 column8"> ' . $v->bld_grp . '</td>
									<td class="cell100 column4"> ' . $v->date . '</td>
									<td class="cell100 column4"> <button id="' . $v->cm_no . '" type="button" data-toggle="modal" data-target="#donation" onClick="view(this.id)" style="width:120px" class=" btn btn-rounded btn-success "><i class="fa fa-check" aria-hidden="true"></i>View</button> <button onClick="rejected(this.id)" id="' . $v->cm_no . '" data-toggle="modal" data-target="#centralModalDanger" type="button" style="width:120px" class="c btn btn-rounded btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></i> Download</button></td></td>
                  
								



								</tr>

								 
							</tbody>
						</table>';
      }

      echo ($output);
    }


    public function bloodStockDetailsAction()
    {




      // $stock =  $stockModel->getAllFromStock(); 
      $banks = $this->StaffModel->getAllBloodBanks();
      $this->view->banks = $banks;

      $this->view->render('reports/bloodStockDetails');
    }


    public function stockDetailsAction()
    {

      $stockModel = new Stock();
      // $stock =  $stockModel->getAllFromStock(); 

      $output = '';
      $result = '';

      if ((isset($_POST["bld_banks"]) && $_POST['bld_banks'] != '') && (isset($_POST["bld_grps"])  && $_POST['bld_grps'] != '')) {
        $banks = $_POST["bld_banks"];
        $blood = $_POST["bld_grps"];
        $stock = $stockModel->sortByBldAndBank($blood, $banks);
      } elseif (isset($_POST["bld_banks"]) && $_POST['bld_banks'] != '') {
        $banks = $_POST["bld_banks"];
        //$blood = '';


        $stock = $stockModel->bloodBankSort($banks);
        // dnd($stock);
      } elseif (isset($_POST["bld_grps"]) && $_POST['bld_grps'] != '') {
        //$donor_city = '';
        $blood = $_POST["bld_grps"];
        $stock = $stockModel->findFromBlood($blood);
      } elseif (isset($_POST["nic"]) && $_POST['nic'] != '') {
        $nic = $_POST["nic"];
        $stock = $stockModel->searchByNic($nic);
        //
      } else {
        $stock =  $stockModel->getAllFromStock();
        //dnd($city);
      }
      function icons($val)
      {

        if ($val == 1) {
          return '<i class="bi bi-check-lg"></i>';
        } else {
          return '<i class="bi bi-dash-lg"></i>';
        }
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


                  <td class="cell100 column1"> <a href="' . PROOT . 'staff/donorData/' . $v->id . '"> ' . $v->donor_nic . '</a></td>                
									<td class="cell100 column2"> ' . $v->bld_grps . '</td>
									<td class="cell100 column3"> ' . $v->bld_banks . '</td>
									<td class="cell100 column8"> ' . $v->date . '</td>
									<td class="cell100 column4"> ' . icons($v->bld_rbc) . '</td>
                  
									<td class="cell100 column5"> ' . icons($v->bld_wbc) . '</td>
									<td class="cell100 column6"> ' . icons($v->bld_plasma) . '</td>
									<td class="cell100 column7"> ' . icons($v->bld_plates) . '</td>
									



								</tr>

								 
							</tbody>
						</table>';
      }

      echo ($output);
    }


    public function bloodDonationReportAction()
    {


      $donationModel = new Donation();
      $stock =  $donationModel->piechart();
      $donate = $donationModel->barchart();
      //dnd($stock);

      //
      $banks = $this->StaffModel->getAllBloodBanks();
      $this->view->banks = $banks;
      $this->view->result = $stock;
      $this->view->results = $donate;



      $this->view->render('reports/bloodDonationReport');
    }

    public function bloodDonationAction()
    {
      $donationModel = new Donation();

      if (isset($_POST['bld_bank'])) {
        $bank =  $_POST['bld_bank'];

        $pie =  $donationModel->piechartBank($bank);
        $bar =  $donationModel->barchartBank($bank);
        //dnd($bar);

      } else {
        $pie =  $donationModel->piechart();
        // dnd($pie); 
        $bar =  $donationModel->barchart();
      }


      $results = [
        'pie' => $pie,
        'bar' => $bar,


      ];

      echo json_encode($results);
    }

    public function homeChartsAction()
    {
      $donationModel = new Donation();
      $bank = staff()->assigned;



      $pie =  $donationModel->piechartBank($bank);
      $bar =  $donationModel->barchartBank($bank);
      //dnd($bar);

      


      $results = [
        'pie' => $pie,
        'bar' => $bar,
        

      ];

      echo json_encode($results);
    }
    public function sadminChartsAction()
    {
      $donationModel = new Donation();
      //$bank = staff()->assigned;



      $pie =  $donationModel->piechart();
      $bar =  $donationModel->barchart();
      //dnd($bar);




      $results = [
        'pie' => $pie,
        'bar' => $bar,
        

      ];

      echo json_encode($results);
    }
    public function mltChartAction()
    {
      $donationModel = new Donation();
      $bank = staff()->assigned;




      $bar =  $donationModel->barchartMLT($bank);
      //dnd($bar);



      $results = [

        'bar' => $bar,


      ];

      echo json_encode($results);
    }



    public function bloodStockReportAction()
    {


      $stockModel = new Stock();

      $stock =  $stockModel->piechart();
      $bank = "Jaffna";
      $bar =  $stockModel->barchartBank($bank);
      $banks = $this->StaffModel->getAllBloodBanks();
      // dnd($bar);
      $currentBnk = staff()->assigned;

      $this->view->banks = $banks;
      $this->view->currentBank = $currentBnk;
      // dnd($currentBnk);
      $this->view->result = $stock;
      //  $this->view->bar = $bar;



      //dnd( $donate);
      // echo json_encode($currentBnk);
      $this->view->render('reports/bloodStockReport');
    }


    public function bloodStockAction()
    {
      $stockModel = new Stock();

      if (isset($_POST['bld_bank'])) {
        $bank =  $_POST['bld_bank'];
        $pie =  $stockModel->piechartBank($bank);
        $bar =  $stockModel->barchartBank($bank);
      } else {
        $pie =  $stockModel->piechartBank(staff()->assigned);
        $bar =  $stockModel->barchartBank(staff()->assigned);
        //dnd($bar);
      }


      $results = [
        'pie' => $pie,
        'bar' => $bar,


      ];

      echo json_encode($results);
    }

    public function donorDetailsAction()
    {


      $donorModel = new Donor('donor');
      $donor =  $donorModel->getAllDonors();

      //dnd( $donor);

      $this->view->donor = $donor;


      $this->view->render('reports/donorDetails');
    }
  }
