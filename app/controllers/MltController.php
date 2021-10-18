<?php

class MltController extends Controller
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('Staff');
        $this->view->setLayout('default');
    }


    public function checkDonationsAction()
    {


        // dnd($_POST['text']);

        if (isset($_POST['cm_no']) && $_POST['cm_no'] != '') {
            // dnd($donor_id);

            $donationModel = new Donation();

            $donor = $donationModel->findByCM($_POST['cm_no']);
            //dnd($donor[0]->status);

            echo json_encode($donor[0]);
            exit;
        }

        $this->view->render('mlt/checkDonations');
    }

    public function checkAction()
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
            $check = $donationModel->getAllUncheckedDonations($bank);
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
        <td class=" "> <button id="' . $v->cm_no . '" type="button" data-toggle="modal" data-target="#donation" onClick="view(this.id)" style="width:100px" class=" btn btn-rounded btn-outline-info" data-mdb-ripple-color="dark"><i class="fa fa-check" aria-hidden="true"></i>View</button> </td>
        <td class=" "> <button id="' . $v->cm_no . '" type="button" data-toggle="modal" data-target="#exampleModal" onClick="approve(this.id)" style="width:120px" class=" btn btn-rounded btn-success "><i class="fa fa-check" aria-hidden="true"></i>Approve</button> <button onClick="rejected(this.id)" id="' . $v->cm_no . '" data-toggle="modal" data-target="#centralModalDanger" type="button" style="width:120px" class="c btn btn-rounded btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></i> Reject</button></td>





        </tr>


    </tbody>
</table>';
        }

        echo ($output);
    }

    public function approvedAction()
    {

        $cm = $_POST['cm_no'];
        // dnd($donor_id);

        $donationModel = new Donation();

        $donor = $donationModel->findByCM($cm);
        //dnd($donor[0]->status);

        $donor[0]->status = 'approved';
        $donor[0]->tested_disease = 'No';

        $donationModel->update($donor[0]->id, $donor[0]);
    }


    public function rejectedAction()
    {

        $cm = $_POST['cm_no'];

        // dnd($_POST['text']);

        if (isset($cm, $_POST['text']) && $_POST['text'] != '') {
            // dnd($donor_id);

            $donationModel = new Donation();

            $donor = $donationModel->findByCM($cm);
            //dnd($donor[0]->status);

            $donor[0]->status = 'rejected';
            $donor[0]->tested_disease = $_POST['text'];

            $donationModel->update($donor[0]->id, $donor[0]);
        }
    }

    public function viewRecordAction()
    {
    }




    public function checkedBloodAction()
    {
        //dnd(staff()->acl);

        $this->view->render('mlt/checkedBlood');
    }

    public function checkedAction()
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
            $check = $donationModel->getAllCheckedBlood($bank);
            //  dnd($check);
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
        <td class=" "> ' . $v->status . '</td>
        





        </tr>


    </tbody>
</table>';
        }

        echo ($output);
    }
}
