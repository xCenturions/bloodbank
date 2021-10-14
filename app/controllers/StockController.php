<?php

class StockController extends Controller
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('Staff');
        $this->view->setLayout('default');
    }


    public function addBloodToStockAction()
    {
        //dnd(staff()->acl);

        $this->view->render('stock/addBloodToStock');
    }

    public function approvedBloodAction()
    {


        $bank = staff()->assigned;

        $donationModel = new Donation();
        // $stock = $stockModel->getAllFromStock();

        $output = '';
        $result = '';

        if ((isset($_POST["cm_no"]) && $_POST['cm_no'] != '') && (isset($_POST["from_date"], $_POST['to_date']) && $_POST['to_date'] != '')) {



            $check = $donationModel->sortByCMAndDate($bank, $_POST["cm_no"], $_POST["from_date"], $_POST['to_date']);
            // dnd($donation);

        } elseif (isset($_POST["from_date"]) && $_POST['to_date']) {



            $check = $donationModel->sortByDate($_POST["from_date"], $_POST['to_date']);
            // dnd($stock);
        } elseif (isset($_POST["bld_banks"]) && $_POST['bld_banks'] != '') {
            //$donor_city = '';
            $bank = $_POST["bld_banks"];
            $check = $donationModel->findFromBank($bank);
            // dnd($donation);

        } elseif (isset($_POST["cm_no"]) && $_POST['cm_no'] != '') {
            //$nic = $_POST["nic"];
            $check = $donationModel->findCM($_POST["cm_no"], $bank);
            // dnd($donation);
            //
        } else {
            $check = $donationModel->getAllApprovedBlood($bank);
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


        <td class=""> ' . $v->cm_no . '</a></td>
        <td class=" "> ' . $v->nic . '</td>
        <td> ' . $v->donor_name . '</td>
        <td class=" "> ' . $v->bld_grp . '</td>
        <td class=" "> ' . $v->date . '</td>
        <td class=" "> <button id="' . $v->cm_no . '" type="button" data-toggle="modal" data-target="#centralModalSuccess" onClick="add(this.id)" style="width:150px" class=" btn btn-rounded btn-success "><i class="fa fa-check" aria-hidden="true"></i>Add To Stock</button> </td>





        </tr>


    </tbody>
</table>';
        }

        echo ($output);
    }


    public function addAction()
    {

        $cm = $_POST['cm_no'];
        // dnd($donor_id);

        $donationModel = new Donation();

        $donor = $donationModel->findByCMApproved($cm);
        //dnd($donor[0]->status);

        $output = [

            'bld_grp' => $donor[0]->bld_grp,
            'nic' => $donor[0]->nic,
            'cm' => $cm,

        ];




        echo json_encode($output);
    }


    public function addToStockAction()
    {

        $bank = staff()->assigned;

        if ($_POST) {



            $donationModel = new Donation();
            $stockModel = new Stock();

            $donor = $donationModel->findByCMApproved($_POST['cm_no']);
            $added = $donationModel->findByCM($_POST['cm_no']);

            //  dnd($donor[0]);

            $data = [

                'cm_no' => $_POST['cm_no'],
                'donor_nic' => $donor[0]->nic,
                'bld_grps' => $donor[0]->bld_grp,
                'date' =>  date('Y-m-d'),
                'bld_rbc' =>  $_POST['rbc'],
                'bld_wbc' =>  $_POST['wbc'],
                'bld_plates' =>  $_POST['plates'],
                'bld_plasma' =>  $_POST['plasma'],
                'bld_banks' =>  $bank,

            ];

            // dnd($donor);

            if ($stockModel->addToStock($data)) {

                $added[0]->is_added = 'Yes';

                // dnd($donor[0]);
                $donationModel->update($added[0]->id, $added[0]);
                echo (1);
            } else {
                echo (0);
            }
        }
    }


    public function alertsAction()
    {

        if (staff() && staff()->designation == 'MO') {


            $alertModel = new Alerts();

            $alerts = $alertModel->getAllAlerts(staff()->assigned);


            if (!empty($alerts) && $alerts[0]->status == 'unopened') {


                $res = explode(",", $alerts[0]->alert);
                $res = array_filter($res);
                // dnd($sd) ;

                $this->view->date = $alerts[0];
                $this->view->alert = $res;
            }
        } else {
            Router::redirect('Restricted');
        }




        $this->view->render('stock/alerts');
    }

    public function alertCloseAction($bank)
    {


        $alertModel = new Alerts();

        $alerts = $alertModel->getAllAlerts($bank);

        $alerts[0]->status = 'opened';

        $alertModel->update($alerts[0]->id, $alerts[0]);
        Router::redirect('stock/alerts');
    }
}
