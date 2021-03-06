<?php

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class DonorController extends Controller
{

  public function __construct($controller, $action)
  {
    parent::__construct($controller, $action);
    $this->load_model('Donor');
    $this->view->setLayout('default');
  }

  public function loginAction()
  {
    $validation = new Validate();

    if ($_POST) {
      // form validation
      $validation->check($_POST, [
        'nic' => [
          'display' => "nic",
          'required' => true
        ],
        'password' => [
          'display' => 'Password',
          'required' => true,
          'min' => 6
        ]
      ], true);
      if ($validation->passed()) {
        //   if($_POST['acl'] == 'Staff'){
        //     $staffModel = new StaffModel('staff');
        //     $user = $this->StaffModel->findByUsername($_POST['nic']);
        //   }
        //   else{
        $user = $this->DonorModel->findByUsername($_POST['nic']);
        //   }

        if ($user && password_verify(Input::get('password'), $user->password)) {
          if ($user->is_active == 'confirm') {

            $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
            $user->login($remember);
            Router::redirect('');
          } else {
            $validation->addError("Your Account in not verified");
          }
        } else {
          $validation->addError("There is an error with your nic or pw");
        }
      }
    }

    $this->view->displayErrors = $validation->displayErrors();

    $this->view->render('donor/login');
  }

  public function logoutAction()
  {
    if (currentUser()) {
      currentUser()->logout();
    }
    Router::redirect('donor/login');
  }

  public function registerAction()
  {
    $validation = new Validate();

    $posted_values = ['donor_name' => '', 'nic' => '', 'donor_email' => '', 'password' => '', 'confirm' => '', 'donor_city' => '', 'dob' => ''];
    if ($_POST) {
      $posted_values = posted_values($_POST);

      $validation->check($_POST, [
        'donor_name' => [
          'display' => 'First Name',
          'required' => true
        ],


        'nic' => [
          'display' => 'National Identity Card Number',
          'required' => true,
          'unique' => 'donor',
          'min' => 6,
          'max' => 150,
          'valid_nic'=> true


        ],
        'donor_email' => [
          'display' => 'Email',
          'required' => true,
          'unique' => 'donor',
          'max' => 150,
          'valid_email' => true
        ],
        'password' => [
          'display' => 'Password',
          'required' => true,
          'min' => 6,
        ],
        'confirm' => [
          'display' => 'nic',
          'required' => true,
          'matches' => 'password',
        ],



        'dob' => [
          'display' => 'Donor Age',
          'required' => true,
          'valid_age' => true,
        ]


      ], true);


      // dnd($_POST);
      if ($validation->passed()) {
        $newUser = new Donor();
        $newUser->verification_code = getToken(32);
        $newUser->is_active = 'unverified';
        //dnd($newUser->verification_code);


        $newUser->registerNewUser($_POST);
        $newUser->verification($newUser->donor_email, $newUser->verification_code, $newUser->donor_name);
        //$newUser->login();
        Router::redirect('home/thankyou');
      }
    }

    $cities = $this->DonorModel->getAllCities();
    $this->view->cities = $cities;
    // dnd($validation);
    $this->view->post = $posted_values;
    $this->view->displayErrors = $validation->displayErrors();
    $this->view->render('donor/register');
  }

  // Account profile
  // public function profileAction(){

  //   $contact = $this->DonorModel->findById(currentUser()->id);

  // $this->view->render('donor/details');
  // }



  public function detailsAction()
  {



    //dnd($donorData);
    $donationModel = new Donation();
    $formData = new Form();
    $donorData = $formData->getDonorData(currentUser()->id);
    $donation = $donationModel->findDonorById(currentUser()->id);
    $map = $this->DonorModel->findDonorMapData(currentUser()->donor_city);

    //dnd($map[0]);

    $this->view->donor =  $map[0];
    $this->view->donation = $donation;
    $this->view->data = $donorData;
    $this->view->render('donor/details');
  }






  //  Account edit
  public function edit_profileAction($id)
  {

    if (currentUser()) {

      if ($id != currentUser()->id) {
        Router::redirect('Restricted');
      }
    }

    $donor = $this->DonorModel->findDonorById($id);
    $formModel = new Form();
    $formData = $formModel->getDonorData($id);
    //dnd($formData->name);

    $validation = new Validate();

    if ($_POST) {

      $validation->check($_POST, [
        'donor_name' => [
          'display' => 'First Name',
          'required' => true
        ]
        // 'password' => [
        //   'display' => 'Password',
        //   'required' => true ,
        //   'min' => 6,
        // ],
       
      ], false);

      if ($validation->passed()) {
        $updateFields = $_POST;
        //dnd($updateFields);
        $this->DonorModel->update(currentUser()->id, $updateFields);
        $formModel->update(currentUser()->id, $updateFields);
        Router::redirect('donor/details');
      }
    }

    $this->view->donor = $donor;
    $this->view->donorForm = $formData;
    //dnd($donor->donor_email);
    // $this->view->postAction = PROOT . 'donor' . DS . 'edit_profile' . DS . currentUser()->id;
    $this->view->displayErrors = $validation->displayErrors();

    $this->view->render('donor/edit_profile');
  }


  //qrcode

  public function qrcodeAction($id)
  {
    if (currentUser()) {

      if ($id != currentUser()->id) {
        Router::redirect('Restricted');
      }
    }


    $renderer = new ImageRenderer(
      new RendererStyle(400),
      new ImagickImageBackEnd()
    );
    // $details = new Donor();
    $details = $this->DonorModel->findDonorById($id);

    $details = 'Donor Name : ' . $details->donor_name .  "<br />" . ' ' . 'Donor NIC : ' . $details->nic . "<br />";
    // $details .= 
    // $details .= 'Donor Mobile Number  : ' . $details->donor_mobile;
    //dnd($details);

    $writer = new Writer($renderer);

    $qr_image = base64_encode($writer->writeString($details));
    $this->view->qr_image = $qr_image;

    $this->view->render('donor/qrcode');
  }


  ///////////////email verifivation

  public function verifyAction()
  {

    $id = $_GET['id'];
    $hash = $_GET['hash'];



    // $donor = $donorModel->findId($id);
    $donor = $this->DonorModel->verify($id);


    if ($donor[0]->verification_code == $hash) {


      if ($donor[0]->is_active == "unverified") {

        $donor[0]->is_active = "confirm";
        $this->DonorModel->update($id, $donor[0]);
      } else {
        //////Account already verified *********************add a page to this
      }
    }

    $this->view->render('home/success');
  }







  ///donor form 

  public function formAction()
  {

    $validation = new Validate();


    if ($_POST) {

      $validation->check($_POST, [
        'name' => [
          'display' => 'Name',
          'required' => true
        ],

        'email' => [
          'display' => 'Email',

          'valid_email' => true

        ],


        'mobile' => [
          'display' => 'Mobile',

          'valid_mobil' => true

        ],




        'dob' => [
          'display' => 'Date of Birth ',
          'required' => true,
          'valid_age' => true
        ],

        'age' => [
          'display' => 'Age ',
          'required' => true,
          'valid_number' => true
        ],
        'address' => [
          'display' => 'Address ',
          'required' => true
        ],
        'nic' => [
          'display' => 'NIC ',
          'required' => true
        ],

      ]);


      if ($validation->passed()) {
        $form = new Form();

        $form->submit($_POST);


        $donor = $this->DonorModel->findId(currentUser()->id);
        //dnd($donor);
        if ($donor[0]->form == "not_submitted") {

          $donor[0]->form = "submitted";
          $this->DonorModel->update(currentUser()->id, $donor[0]);
        }
      }
      // dnd($form);   
    }
    //dnd($_POST);
    $this->view->displayErrors = $validation->displayErrors();
    $this->view->render('donor/form');
  }

  // -----------------------edit Form---------------------------------------------

  public function editFormAction($id)
  {

    $validation = new Validate();
    $formModel = new Form();
    $formData = $formModel->getDonorData($id);
    //dnd($_POST);
    if ($_POST) {

      $validation->check($_POST, [
        'name' => [
          'display' => 'Name',
          'required' => true
        ],

        'email' => [
          'display' => 'Email',

          'valid_email' => true

        ],


        'mobile' => [
          'display' => 'Mobile',

          'valid_mobil' => true

        ],




        'dob' => [
          'display' => 'Date of Birth ',
          'required' => true,
          'valid_age' => true
        ],

        'age' => [
          'display' => 'Age ',
          'required' => true,
          'valid_number' => true
        ],
        'address' => [
          'display' => 'Address ',
          'required' => true
        ],
        'nic' => [
          'display' => 'NIC ',
          'required' => true
        ],

      ]);


      if ($validation->passed()) {

        $updateFields = $_POST;

        $formModel->update($formData->id, $updateFields);
      }

      // dnd($form);   
    }
    //dnd($_POST);
    $this->view->displayErrors = $validation->displayErrors();
    $this->view->data = $formData;
    $this->view->render('donor/editForm');
  }



  //********************************* PDF Form Generating *****************************//

  public function pdfFormAction($id)
  {

    if (currentUser()) {

      if ($id != currentUser()->id) {
        Router::redirect('Restricted');
      }
    }


    $donorForm = new Form();

    $form = $donorForm->getDonorData($id);

    // dnd($nw['']_1_1);

    require('app/lib/PDF/autoload.php');

    //make TCPDF object
    $pdf = new TCPDF('P', 'mm', 'A4');

    //remove default header and footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pdf->SetFontSpacing(0.2);


    //title
    $pdf->SetFont('sinhala', '', 14);
    $pdf->AddPage('P', 'A4');
    $pdf->SetAutoPageBreak(true, 10);
    $pdf->SetTopMargin(10);
    $pdf->SetLeftMargin(10);
    $pdf->SetRightMargin(10);
    $pdf->Rect(5, 5, 200, 287, 'D');

    $image1 = "img/nb.jpg";

    $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78);

    /* --- Cell --- */
    $pdf->SetXY(10, 11);
    $pdf->SetFontSize(15);
    $pdf->Cell(0, 8, 'Y%s ,xld cd;sl re??r mdr??,hk fiajh', 0, 1, 'C', false);


    $pdf->SetFontSize(22);
    $pdf->Cell(0, 8, 're??r odhl m%ldYh yd jd??;dj', 0, 1, 'C', false);

    /* --- Line --- */
    $pdf->SetDrawColor(255, 109, 107);
    $pdf->Line(10, 30, 200, 30);
    $pdf->SetDrawColor(0);

    /* --- Text --- */
    $pdf->SetFont('', 'B', 12);
    $pdf->Text(10, 35, 're??r m??;Hd.YS,S ys;j;"');

    $pdf->SetY(41);
    $pdf->Write(5, 'f,a oka fok Tf??;a" Tf?? f,a ,nd .kakd frda.Ska f.a;a" wdrlaIdj ;yjqre ls??u i|yd lreKdlr fuu ??ia;r m;%sldj ksjer?? j" ;ks j u mqrjkak m;%sldj msr??ug fmr uq,a msgqf?? i|yka ???re??r odhl Wmfoia ud,dj?? fyd??ka lshjd f;are?? .kak ta i??nkaOfhka .eg??jla we;ak?? lreKdlr cd;sl re??r mdr??,hk fiajfha ld??h uKav,fhka ??uikak');

    /* --- Text --- */
    $dat = json_encode($form, true);
    //dnd($dat);
    $new = str_replace('T&otilde;', 'T??', $dat);
    $nw = json_decode($new, true);


    $pdf->Text(10, 70, '^1& w& Tn ??g fmr f,a oka ?? ;sf?? o @ ');
    /* --- Text --- */
    $pdf->Text(180, 70, $nw['_1_1']);

    /* --- Text --- */
    $pdf->Text(15.5, 80, 'wd& tfiak?? lS jrla o@ ');
    /* --- Text --- */
    $pdf->Text(180, 80, $nw['_1_2']);

    /* --- Text --- */
    $pdf->Text(15.5, 90, 'we& wjika jrg f,a ??ka ??kh ');
    /* --- Text --- */
    $pdf->Text(180, 90, $nw['_1_3']);

    /* --- Text --- */
    $pdf->Text(15.5, 100, 'wE& l,ska f,a ??ka ??ka wjia:dj, Tng h?? wmyiqjla ?? ;sf?? o@ ');
    /* --- Text --- */
    $pdf->Text(180, 100, $nw['_1_4']);

    /* --- Text --- */
    $pdf->Text(17, 110, 'b& wmyiq;djla ?? k?? th i|yka lrkak ');
    /* --- Text --- */
    $pdf->Text(150, 110, $nw['_1_5']);

    /* --- Text --- */
    $pdf->Text(17, 120, 'B& f,a fkdfok f,ig fl??kl fyda Tng ffjoH Wmfoia ,e?? ;sf?? o@ ');
    /* --- Text --- */
    $pdf->Text(180, 120, $nw['_1_6']);

    /* --- Text --- */
    $pdf->Text(17, 130, 'W& Tn wo ??k ,enqKq re??r odhl Wmfoia m;%sldj lshjd fyd??ka f;are?? ');
    $pdf->Text(21, 135, ' .;af;ys o@  ');
    /* --- Text --- */
    $pdf->Text(180, 130, $nw['_1_7']);

    $pdf->SetDrawColor(159, 159, 159);
    $pdf->Line(10, 145, 200, 145);
    $pdf->SetDrawColor(0);


    /* --- Text --- */
    $pdf->Text(10, 150, '^2& w& Tn oekg fyd| fi!LH ;;ajfhka miq jkafka o@ ');
    /* --- Text --- */
    $pdf->Text(180, 150, $nw['_2_1']);

    $pdf->SetY(160);
    $pdf->Write(5, 'wd& Tng my; oelafjk ljr fyda frda.S ;;a;ajhla je<?? fyda ta i|yd m%;sldr f.k ;sf??o tfia k?? wod< frda.h b????fhka ??? ,l=K fhdokak ');

    ////check
    $pdf->Text(23, 175, 'yDo frda. ');
    $pdf->SetFont('freeserif', '', 14);
    $pdf->SetTextColor(255, 109, 107);
    $pdf->Text(19, 175, $nw['_2_2_1']);

    /* --- Text --- */
    $pdf->SetFont('sinhala', '', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Text(23, 185, '??hje??hdj ');
    $pdf->SetFont('freeserif', '', 14);
    $pdf->SetTextColor(255, 109, 107);
    $pdf->Text(19, 185, $nw['_2_2_2']);
    /* --- Text --- */
    $pdf->SetFont('sinhala', '', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Text(23, 195, 'j,smamqj');
    $pdf->SetFont('freeserif', '', 14);
    $pdf->SetTextColor(255, 109, 107);
    $pdf->Text(17, 195, $nw['_2_2_3']);

    ////check
    $pdf->SetFont('sinhala', '', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Text(90, 175, 'wxYNd.h ');
    $pdf->SetFont('freeserif', '', 14);
    $pdf->SetTextColor(255, 109, 107);
    $pdf->Text(83, 175, $nw['_2_2_4']);
    /* --- Text --- */
    $pdf->SetFont('sinhala', '', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Text(90, 185, 'we??u$ fmky????? frda. ');
    $pdf->SetFont('freeserif', '', 14);
    $pdf->SetTextColor(255, 109, 107);
    $pdf->Text(83, 185, $nw['_2_2_5']);
    /* --- Text --- */
    $pdf->SetFont('sinhala', '', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Text(90, 195, 'wlaud frda. ');
    $pdf->SetFont('freeserif', '', 14);
    $pdf->SetTextColor(255, 109, 107);
    $pdf->Text(83, 195, $nw['_2_2_6']);

    $pdf->SetFont('sinhala', '', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Text(163, 175, 're??r frda. ');
    $pdf->SetFont('freeserif', '', 14);
    $pdf->SetTextColor(255, 109, 107);
    $pdf->Text(157, 175, $nw['_2_2_7']);
    /* --- Text --- */
    $pdf->SetFont('sinhala', '', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Text(163, 185, 'ms<sld ');
    $pdf->SetFont('freeserif', '', 14);
    $pdf->SetTextColor(255, 109, 107);
    $pdf->Text(157, 185, $nw['_2_2_8']);
    /* --- Text --- */
    $pdf->SetFont('sinhala', '', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Text(163, 195, 'jl=.vq frda.h ');
    $pdf->SetFont('freeserif', '', 14);
    $pdf->SetTextColor(255, 109, 107);
    $pdf->Text(157, 195, $nw['_2_2_9']);

    $pdf->SetFont('sinhala', '', 12);
    $pdf->SetTextColor(0, 0, 0);
    /* --- Text --- */
    $pdf->Text(10, 210, 'we& Tn oekg ljr fyda T!IOhla$ m%;sldrhla ,nd .kafka o @ ');
    /* --- Text --- */
    $pdf->Text(180, 210, $nw['_2_3']);

    /* --- Text --- */
    $pdf->Text(10, 220, 'wE& Tn Y,Hl??uhlg Ndckh ?? ;sf??o @ ');
    /* --- Text --- */
    $pdf->Text(180, 220, $nw['_2_4']);


    /* --- Text --- */
    $pdf->Text(12, 230, 'b& f,a oka ??fuka miq wo ??k Tng nr jevj, fh??ug fyda u.S m%jdyk jdyk');
    $pdf->Text(16, 235, ' meo??u" Wia f.dvke.s,s u; jev ls??u" l?? ke.Su" ??Yd, hkaf;%damlrK');
    $pdf->Text(16, 240, '  l%shd lr??u jeks foaj, fh??ug is??j ;sf?? o @ ');
    /* --- Text --- */
    $pdf->Text(180, 235, $nw['_2_4']);

    /* --- Text --- */
    $pdf->Text(12, 250, 'B& Tn oekg .??N??j is??o u??ls?? ??fuys fhfokafka o miq.sh udi 12 ;=< ');
    $pdf->Text(16, 255, ' ore m%iQ;shlg fyda .??id ??ulg ,la jQfha o@  ');
    /* --- Text --- */
    $pdf->Text(180, 250, $nw['_2_4']);





    /////////////2nd page

    $pdf->addPage();
    $pdf->Rect(5, 5, 200, 287, 'D');

    /* --- Text --- */
    $pdf->Text(10, 11, '^3& w& fl??kl fyda Tng ly WK$fix.ud,h je,?? ;sf??o@ ');
    /* --- Text --- */
    $pdf->Text(180, 11, $nw['_3_1']);

    $pdf->Text(16, 21, 'wd& miq.sh jir 2 ;=< laIh frda.h je<?? ;sf??o@ Bg m%;sldr f.k ;sf??o@ ');
    /* --- Text --- */
    $pdf->Text(180, 21, $nw['_3_2']);

    $pdf->SetDrawColor(159, 159, 159);
    $pdf->Line(10, 31, 200, 31);
    $pdf->SetDrawColor(0);

    $pdf->Text(10, 36, '4& miq.sh udi 12 ;=<" ');
    /* --- Text --- */


    $pdf->Text(16, 46, 'w& Tn m%;sYla;slrK fyda fjk;a tkak;la ,ndf.k ;sf??o@ ');
    /* --- Text --- */
    $pdf->Text(180, 46, $nw['_4_1']);


    $pdf->Text(16, 56, 'wd& lka ????ula"m??pd fl??ula fyda lgq ??ls;aid m%;sldrhla is??lr ;sf??o@ ');
    /* --- Text --- */
    $pdf->Text(180, 56, $nw['_4_2']);

    $pdf->Text(16, 66, 'we& nkaOkd.dr.; ?? ;sf??o@ ');
    /* --- Text --- */
    $pdf->Text(180, 66, $nw['_4_3']);


    $pdf->Text(16, 76, 'wE& Tn fyda Tnf.a iylre$iyld??h ??foaY.; ?? ;sf??o@  ');
    /* --- Text --- */
    $pdf->Text(180, 76, $nw['_4_4']);

    $pdf->Text(16, 86, 'b& Tng fyda Tnf.a iylre$iyld??hg re??rh fyda re??r fldgia ,nd ?? ;sf??o@ ');
    /* --- Text --- */
    $pdf->Text(180, 86, $nw['_4_5']);

    $pdf->Text(16, 96, 'B& Tng uef,a??hdj je<?? fyda Bg m%;sldr f.k ;sf??o@ ');
    /* --- Text --- */
    $pdf->Text(180, 96, $nw['_4_6']);


    $pdf->SetDrawColor(159, 159, 159);
    $pdf->Line(10, 106, 200, 106);
    $pdf->SetDrawColor(0);

    $pdf->Text(10, 111, '^5& w&miq.sh udi 6 ;=< Tng fvx.= je<?? fyda Bg m%;sldr f.k ;sf??o@ ');
    /* --- Text --- */
    $pdf->Text(180, 111, $nw['_5_1']);

    $pdf->Text(16, 121, 'wd& miq.sh udih ;=< -mefmd,"ir??m"l??uq,a.dh"refn,a,d WK^c??uka ir??m&');
    $pdf->Text(22, 126, ' mdpkh fyda fjk;a l,amj;akd^i;shlg je??& WKlska fm??fKao@ ');
    /* --- Text --- */
    $pdf->Text(180, 125, $nw['_5_2']);

    $pdf->Text(16, 136, 'we& miq.sh i;sh ;=,-Tf?? o;a .e,??ula is??lr ;sf??o@ ');
    /* --- Text --- */
    $pdf->Text(180, 136, $nw['_5_3']);

    $pdf->Text(16, 146, 'wE& miq.sh i;sh ;=<-Tn m%;s??jlfyda weiam%Ska fyda^fjk;a& T!IO lsisjla  ');
    $pdf->Text(22, 150, ' Nd??;d lf<ao@ ');

    /* --- Text --- */
    $pdf->Text(180, 147, $nw['_5_4']);

    $pdf->SetDrawColor(159, 159, 159);
    $pdf->Line(10, 160, 200, 160);
    $pdf->SetDrawColor(0);

    $pdf->SetFillColor(255, 133, 135);
    $pdf->Rect(10, 165, 190, 120, 'FD');

    $pdf->Text(11, 170, '^6& w&my; oelafjk ljr fyda ldKavhlg Tn wh;a f?? k?? f,a oka??u iq??iq fkdjk nj  ');
    $pdf->Text(18, 175, '  okafkyso@ ');
    /* --- Text --- */

    $pdf->Text(25, 185, '??? Tn ta??ia fyda fix.ud, wdidOkhlg ,la jQfjl= k?? ');
    $pdf->Text(25, 193, '??? Tf?? ,sx.sl in|;d tla wfhl=g iSud ?? fkdue;sk??  ');
    $pdf->Text(25, 201, '??? Tn fjk;a ms????fhl= iu. iu,sx.sl weiqrl fh?? we;s ms????fhl= k??  ');
    $pdf->Text(25, 209, '??? Tn fl??kl fyda u;a ??jHhka Y??rhg tkak;a fldg f.k ;sf?? k?? ');
    $pdf->Text(25, 217, '??? Tn fl??kl fyda .???ld jD;a;sfhys fh?? ;sf?? k??  ');
    $pdf->Text(25, 225, '??? Tng miq.sh udi 12 ;=< fl??kl fyda .???ld weiqrl fh?? ;sf?? k??');
    $pdf->Text(25, 233, '??? Tng fyda Tf?? iylre$iyld??hg ta??ia fyda fjk;a ,sx.sl frda. ');
    $pdf->Text(27, 238, ' wdidOkhla ;sf??oehs ielhla we;ak??" ');

    $pdf->Text(16, 248, 'wd& Tn fyda Tf?? iylre$iyld??h by; ioyka ljr fyda ldKavhlg wh;a f??o@');
    /* --- Text --- */
    $pdf->Text(180, 248, $nw['_5_4']);

    $pdf->Text(16, 258, 'we& Tn"isref?? nr wvq ??ulska"l=oaoe??^jid .%ka?? &"b????ulska"l,a mj;akd WKlska');
    $pdf->Text(22, 263, ' fyda mdpkfhka fmf<ao@   ');
    /* --- Text --- */
    $pdf->Text(180, 263, $nw['_5_4']);


    //////////////////////3rd page

    $pdf->addPage();
    $pdf->Rect(5, 5, 200, 287, 'D');

    $pdf->Text(10, 16, 'i??mQ??K ku ( ');
    /* --- Text --- */
    $pdf->SetFont('freeserif', '', 12);
    $pdf->Text(40, 16, $nw['name']);

    $pdf->SetFont('sinhala', '', 14);
    $pdf->Text(150, 16, 'mqreI $ ia;%S (');
    $pdf->Text(155, 21, 'Ndjh');
    /* --- Text --- */
    $pdf->SetFont('freeserif', '', 12);
    $pdf->Text(178, 16, $nw['sex']);

    $pdf->SetFont('sinhala', '', 14);
    $pdf->Text(10, 26, 'cd;sl ye??kq??m;a wxlh ( ');
    /* --- Text --- */
    $pdf->SetFont('freeserif', '', 12);
    $pdf->Text(65, 26, $nw['nic']);
    
    $pdf->SetFont('sinhala', '', 14);

    $pdf->Text(10, 36, 'ksjfia ,smskh  ( ');
    $pdf->Text(10, 41, '^ia??r$;djld,sl& ');
    /* --- Text --- */
    $pdf->SetFont('freeserif', '', 12);
    $pdf->Text(45, 36, $nw['address']);

    $pdf->SetFont('sinhala', '', 14);
    $pdf->Text(10, 51, '??oHq;a ;emE,  ( ');
    /* --- Text --- */
    $pdf->SetFont('freeserif', '', 12);
    $pdf->Text(45, 51, $nw['email']);

    $pdf->SetFont('sinhala', '', 14);
    $pdf->Text(10, 61, '??rl:k wxlh  ( ');
    /* --- Text --- */
    $pdf->Text(45, 61, $nw['mobile']);

    $pdf->SetFont('sinhala', '', 14);
    $pdf->Text(150, 30, 're??r j??.h (');
    /* --- Text --- */
    $pdf->SetFont('freeserif', '', 14);
    $pdf->Text(178, 30, $nw['bloodgroup']);

    $pdf->SetFont('sinhala', '', 14);
    $pdf->Text(165, 40, 'jhi (');
    /* --- Text --- */
    $pdf->Text(178, 40, $nw['age']); ////////////

    $pdf->Text(154, 50, 'Wmka ??kh (');
    /* --- Text --- */
    $pdf->Text(178, 50, $nw['dob']);

    $pdf->SetDrawColor(159, 159, 159);
    $pdf->Line(10, 71, 200, 71);
    $pdf->SetDrawColor(0);

    $pdf->Text(10, 81, 're??r odhlhdf.a m%ldYh"');

    $pdf->setFontSize(10);
    $pdf->Text(17, 91, '??? lsis?? mqoa.,sl ,dNhla wfmalaIdfjka f;drj" iafj??Pdfjka wo ??k ud m??;Hd. lrk re??rh wirK');
    $pdf->Text(20, 95, 'frda.Skaf.a hym; fjkqfjka Y%S ,xld cd;sl re??r mdr??,hk fiajhg wjYH whq??ka fhdod .ekSug ');
    $pdf->Text(20, 99, 'tl??;djh m< lr??');

    $pdf->Text(17, 109, '??? f,a oka ??f?? ?? fukau bka miqj;a ta ms<sn| cd;sl re??r mdr??,hk fiajh Wmfoia wkqj l%shd lrk w;r  ');
    $pdf->Text(20, 113, ' tfia fkdlS??fuka is????h yels ydks ms<sn| j.lSu uu ndr .ks?? ');

    $pdf->Text(17, 123, '??? ;j o ud m??;Hd. lrk re??rh ta??ia " fymghs??ia ?? iy iS " WmoxYh" uef,a??hdj^Mw,??wd hk frda.  ');
    $pdf->Text(20, 127, ' wdidokhka i|yd fyda cd re md  fiajhg wjYH fjk;a m??laIKhka i|yd m??laIdjg ,la ls??ug udf.a  ');
    $pdf->Text(20, 131, ' tl??;djh m< lr??   ');

    $pdf->Text(17, 141, '??? tfiau by; m??laIKj, m%;sM, cd;sl re??r mdr??,hk fiajhg wjYH wjia:dj,?? ud fj; okajkq ,e??ug;a"   ');
    $pdf->Text(20, 145, ' t jka wjia:dj,?? cd;sl re??r mdr??,hk fiajh u.ska fokq ,nk je?? ??r Wmfoia wkqj l%shd ls??ug;a udf.a   ');
    $pdf->Text(20, 149, ' leue;a; yd tl??;dj m< lr?? ');

    $pdf->Text(17, 159, '??? fuu m;%sldj lshjd fyd??ka jgyd .;a w;r by; m%Yakj,g ud ??iska imhk ,o ms<s;=re j, i;H;djh .ek  ');
    $pdf->Text(20, 163, ' wjxl j iy;sl fj??  ');

    $pdf->Text(17, 173, '??? Kav ks;s ix.%yfha 262" 263 j.ka;s wkqj oekqj;aj frda.hla me;sr??ug lghq;= ls??u o~qj?? ,e??h yels  ');
    $pdf->Text(20, 177, ' jrola nj ms<s.ks??  ');

    $pdf->setFontSize(12);
    $pdf->Text(10, 187, 'hdj??j$ksrka;r re??r odhlfhl= jYfhka wirK frda.Ska fjkqfjka b????hg;a re??rh m??;Hd.');
    $pdf->Text(10, 192, 'ls??ug leue;af;??');

    $pdf->Text(35, 202, $nw['_7']);


    $pdf->Text(20, 265, '---------------------');
    $pdf->Text(30, 270, 'w;aik');
    $pdf->Text(155, 265, '---------------------');
    $pdf->Text(170, 270, '??kh');

    $pdf->addPage();
    $pdf->SetFont('helvetica', '', 12);
   
ob_end_clean();

    $pdf->Output('Donor Form.pdf', 'D');
  }


  public function forgetPasswordAction()
  {
    $validation = new Validate();

    if ($_POST) {

      $validation->check($_POST, [

        'donor_email' => [
          'display' => 'Email',
          'not_exists' => 'donor',
          'valid_email' => true

        ]
      ], false);

      if ($validation->passed()) {

        $donor = $this->DonorModel->findByEmail($_POST['donor_email']);
        $donor->hash = getToken(32);
        // dnd($staff->id);
        $this->DonorModel->update($donor->id, $donor);
        $this->DonorModel->forgetPassword($_POST['donor_email'], $donor->hash, $donor->id);

        Router::redirect("home/mailSent?email=" . base64_encode($_POST['donor_email']) . "");
      }

      // $staff = $this->StaffModel->findbyEmail($_POST['email']);
    }
    $this->view->displayErrors = $validation->displayErrors();
    $this->view->render('donor/forgetPassword');
  }

  public function resetPasswordAction()
  {
    $id = $_GET['id'];
    $hash = $_GET['hash'];
    $donor = $this->DonorModel->findByID($id);
    $validation = new Validate();
    if ($hash == $donor->hash) {

      if ($_POST) {

        $validation->check($_POST, [

          'password' => [
            'display' => 'Password',
            'required' => true,
            'min' => 6,
          ],
          'confirm' => [
            'display' => 'nic',
            'required' => true,
            'matches' => 'password',
          ]
        ], false);

        if ($validation->passed()) {

          $donor->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
          $donor->hash = NULL;
          $this->DonorModel->update($donor->id, $donor);
        }
      }
    } else {
      $validation->addError("Something wrong! You can not Change Password Right Now. Please try again Later");
    }

    $this->view->displayErrors = $validation->displayErrors();
    $this->view->render('donor/resetPassword');
  }
}
