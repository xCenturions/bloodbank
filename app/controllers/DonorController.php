<?php

      use BaconQrCode\Renderer\ImageRenderer;
      use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
      use BaconQrCode\Renderer\RendererStyle\RendererStyle;
      use BaconQrCode\Writer;

  class DonorController extends Controller{

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
        ],true);
         if ($validation->passed()) {
        //   if($_POST['acl'] == 'Staff'){
        //     $staffModel = new StaffModel('staff');
        //     $user = $this->StaffModel->findByUsername($_POST['nic']);
        //   }
        //   else{
             $user = $this->DonorModel->findByUsername($_POST['nic']);
        //   }

          if ($user && password_verify(Input::get('password'), $user->password)) {
            if($user->is_active == 'confirm'){

                   $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
            $user->login($remember);
            Router::redirect('');

            }else{
               $validation->addError("Your Account in not verified");
            }
           
          }else {
            $validation->addError("There is an error with your nic or pw");
          }
        }
      }

      $this->view->displayErrors = $validation->displayErrors();

      $this->view->render('donor/login');

    }

  public function logoutAction()
  {
    if(currentUser()) {
        currentUser()->logout();
    }
    Router::redirect('donor/login');
  }

  public function registerAction()
  {
    $validation = new Validate();
   
    $posted_values = ['donor_name'=>'','nic'=>'', 'donor_email'=>'', 'password'=>'', 'confirm'=>'','donor_city'=>'','dob'=>''];
    if ($_POST) {
      $posted_values = posted_values($_POST);

      $validation->check($_POST, [
        'donor_name' => [
          'display' => 'First Name',
          'required' => true
        ],
       

        'nic' => [
          'display' => 'National Identity Card Number',
          'required' => true ,
          'unique' => 'donor',
          'min' => 6,
          'max' => 150
          

        ],
        'donor_email' => [
          'display' => 'Email',
          'required' => true ,
          'unique' => 'donor',
          'max' => 150,
          'valid_email' => true
        ],
        'password' => [
          'display' => 'Password',
          'required' => true ,
          'min' => 6,
        ],
        'confirm' => [
          'display' => 'nic',
          'required' => true ,
          'matches' => 'password',
        ],

        

        'dob' => [
          'display' => 'Donor Age',
          'required' => true ,
          'valid_age' => true,
        ]


      ],true);


      // dnd($_POST);
      if ($validation->passed()) {
        $newUser = new Donor();
        $newUser->verification_code = getToken(32);
        $newUser->is_active = 'unverified';
        //dnd($newUser->verification_code);

       
        $newUser->registerNewUser($_POST);
        $newUser->verification($newUser->donor_email,$newUser->verification_code,$newUser->donor_name);
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

 

  public function detailsAction(){
    
   
      
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
  public function edit_profileAction($id){

    if(currentUser()){

         if($id != currentUser()->id){
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
        'donor_fname' => [
          'display' => 'First Name',
          'required' => true
        ],
        // 'password' => [
        //   'display' => 'Password',
        //   'required' => true ,
        //   'min' => 6,
        // ],
        'donor_email' => [
          'display' => 'Email',
          'required' => true ,
          'unique' => 'donor',
          'max' => 150,
          'valid_email' => true
        ]
      ],false);

      if ($validation->passed()) {
        $updateFields = $_POST;

        $this->DonorModel->update($id,$updateFields);
        $formModel->update($id,$updateFields);
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
    if(currentUser()){

         if($id != currentUser()->id){
           Router::redirect('Restricted');
         }
    }


    $renderer = new ImageRenderer(
        new RendererStyle(400),
        new ImagickImageBackEnd()
    );
   // $details = new Donor();
    $details = $this->DonorModel->findDonorById($id);
     
    $details = 'Donor Name : ' . $details->donor_name .  "<br />" . ' ' . 'Donor NIC : ' . $details->nic . "<br />" ;
    // $details .= 
    // $details .= 'Donor Mobile Number  : ' . $details->donor_mobile;
  //dnd($details);
   
      $writer = new Writer($renderer);

      $qr_image = base64_encode($writer->writeString($details));
      $this->view->qr_image = $qr_image;

      $this->view->render('donor/qrcode');


  }


  ///////////////email verifivation

  public function verifyAction(){

     $id = $_GET['id'];
    $hash = $_GET['hash'];

    
    
   // $donor = $donorModel->findId($id);
    $donor = $this->DonorModel->verify($id);
 
    
    if($donor[0]->verification_code == $hash){
     

        if($donor[0]->is_active == "unverified"){
          
          $donor[0]->is_active = "confirm";
           $this->DonorModel->update($id, $donor[0]);

        }else{
          //////Account already verified *********************add a page to this
        }
    }
  
  $this->view->render('home/success');

  }


  

 


  ///donor form 

  public function formAction() {

      $validation = new Validate();

     
      if ($_POST) {
     
      $validation->check($_POST, [
        'name' => [
          'display' => 'Name',
          'required' => true
        ],

          'email' => [
          'display' => 'Email',
         
          'valid_email' =>true
          
          ],
       

          'mobile' => [
          'display' => 'Mobile',
         
          'valid_mobil' =>true
          
          ],


        

        'dob' => [
          'display' => 'Date of Birth ',
          'required' => true,
          'valid_age' => true
        ],

        'age' => [
          'display' => 'Age ',
          'required' => true,
          'valid_number'=>true
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
        if($donor[0]->form == "not_submitted"){
          
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

    public function editFormAction($id) {

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
         
          'valid_email' =>true
          
          ],
       

          'mobile' => [
          'display' => 'Mobile',
         
          'valid_mobil' =>true
          
          ],


        

        'dob' => [
          'display' => 'Date of Birth ',
          'required' => true,
          'valid_age' => true
        ],

        'age' => [
          'display' => 'Age ',
          'required' => true,
          'valid_number'=>true
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
    
    $formModel->update($formData->id,$updateFields);
    
    }
         
  // dnd($form);   
}
  //dnd($_POST);
    $this->view->displayErrors = $validation->displayErrors();
    $this->view->data = $formData;
    $this->view->render('donor/editForm');
  }



//********************************* PDF Form Generating *****************************//

    public function pdfFormAction($id) {

      if(currentUser()){

         if($id != currentUser()->id){
           Router::redirect('Restricted');
         }
    }


        $donorForm = new Form();

        $form = $donorForm->getDonorData($id);

       // dnd($nw['']_1_1);

        require('app/lib/PDF/autoload.php');

//make TCPDF object
$pdf = new TCPDF('P','mm','A4');

//remove default header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetFontSpacing(0.2);


//title
$pdf->SetFont('sinhala','',14);
$pdf->AddPage('P', 'A4');
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);
$pdf->Rect(5, 5, 200, 287 , 'D');

$image1 = "img/nb.jpg";

$pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78);

/* --- Cell --- */
$pdf->SetXY(10, 11);
$pdf->SetFontSize(15);
$pdf->Cell(0, 8, 'Y%s ,xld cd;sl reêr mdrú,hk fiajh', 0, 1, 'C', false);


$pdf->SetFontSize(22);
$pdf->Cell(0, 8, 'reêr odhl m%ldYh yd jd¾;dj', 0, 1, 'C', false);

/* --- Line --- */
$pdf->SetDrawColor(255,109,107);
$pdf->Line(10, 30, 200, 30);
$pdf->SetDrawColor(0);

/* --- Text --- */
$pdf->SetFont('', 'B', 12);
$pdf->Text(10, 35, 'reêr mß;Hd.YS,S ys;j;"');

$pdf->SetY(41);
$pdf->Write(5, 'f,a oka fok Tfí;a" Tfí f,a ,nd .kakd frda.Ska f.a;a" wdrlaIdj ;yjqre lsÍu i|yd lreKdlr fuu úia;r m;%sldj ksjerÈ j" ;ks j u mqrjkak m;%sldj msrùug fmr uq,a msgqfõ i|yka —reêr odhl Wmfoia ud,dj˜ fyd¢ka lshjd f;areï .kak ta iïnkaOfhka .eg¿jla we;akï lreKdlr cd;sl reêr mdrú,hk fiajfha ld¾h uKav,fhka úuikak');

/* --- Text --- */
 $dat= json_encode($form, true);
//dnd($dat);
$new =str_replace('T&otilde;','Tõ',$dat); 
$nw = json_decode($new,true);


$pdf->Text(10, 70, '^1& w& Tn óg fmr f,a oka § ;sfí o @ ');
/* --- Text --- */
$pdf->Text(180, 70, $nw['_1_1']);

/* --- Text --- */
$pdf->Text(15.5, 80, 'wd& tfiakï lS jrla o@ ');
/* --- Text --- */
$pdf->Text(180, 80, $nw['_1_2']);

/* --- Text --- */
$pdf->Text(15.5, 90, 'we& wjika jrg f,a ÿka Èkh ');
/* --- Text --- */
$pdf->Text(180, 90, $nw['_1_3']);

/* --- Text --- */
$pdf->Text(15.5, 100, 'wE& l,ska f,a ÿka ÿka wjia:dj, Tng hï wmyiqjla ù ;sfí o@ ');
/* --- Text --- */
$pdf->Text(180, 100, $nw['_1_4']);

/* --- Text --- */
$pdf->Text(17, 110, 'b& wmyiq;djla ù kï th i|yka lrkak ');
/* --- Text --- */
$pdf->Text(150, 110, $nw['_1_5']);

/* --- Text --- */
$pdf->Text(17, 120, 'B& f,a fkdfok f,ig flÈkl fyda Tng ffjoH Wmfoia ,eî ;sfí o@ ');
/* --- Text --- */
$pdf->Text(180, 120, $nw['_1_6']);

/* --- Text --- */
$pdf->Text(17, 130, 'W& Tn wo Èk ,enqKq reêr odhl Wmfoia m;%sldj lshjd fyd¢ka f;areï ');
$pdf->Text(21, 135, ' .;af;ys o@  ');
/* --- Text --- */
$pdf->Text(180, 130, $nw['_1_7']);

$pdf->SetDrawColor(159,159,159);
$pdf->Line(10, 145, 200, 145);
$pdf->SetDrawColor(0);


/* --- Text --- */
$pdf->Text(10, 150, '^2& w& Tn oekg fyd| fi!LH ;;ajfhka miq jkafka o@ ');
/* --- Text --- */
$pdf->Text(180, 150, $nw['_2_1']);

$pdf->SetY(160);
$pdf->Write(5, 'wd& Tng my; oelafjk ljr fyda frda.S ;;a;ajhla je<£ fyda ta i|yd m%;sldr f.k ;sfío tfia kï wod< frda.h bÈßfhka ✓ ,l=K fhdokak ');

////check
$pdf->Text(23, 175, 'yDo frda. ');
$pdf->SetFont('freeserif','',14);
$pdf->SetTextColor(255,109,107);
$pdf->Text(19, 175, $nw['_2_2_1']);

/* --- Text --- */
$pdf->SetFont('sinhala','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(23, 185, 'Èhjeähdj ');
$pdf->SetFont('freeserif','',14);
$pdf->SetTextColor(255,109,107);
$pdf->Text(19, 185, $nw['_2_2_2']);
/* --- Text --- */
$pdf->SetFont('sinhala','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(23, 195, 'j,smamqj');
$pdf->SetFont('freeserif','',14);
$pdf->SetTextColor(255,109,107);
$pdf->Text(17, 195, $nw['_2_2_3']);

////check
$pdf->SetFont('sinhala','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(90, 175, 'wxYNd.h ');
$pdf->SetFont('freeserif','',14);
$pdf->SetTextColor(255,109,107);
$pdf->Text(83, 175, $nw['_2_2_4']);
/* --- Text --- */
$pdf->SetFont('sinhala','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(90, 185, 'weÿu$ fmky¨‍ frda. ');
$pdf->SetFont('freeserif','',14);
$pdf->SetTextColor(255,109,107);
$pdf->Text(83, 185, $nw['_2_2_5']);
/* --- Text --- */
$pdf->SetFont('sinhala','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(90, 195, 'wlaud frda. ');
$pdf->SetFont('freeserif','',14);
$pdf->SetTextColor(255,109,107);
$pdf->Text(83, 195, $nw['_2_2_6']);

$pdf->SetFont('sinhala','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(163, 175, 'reêr frda. ');
$pdf->SetFont('freeserif','',14);
$pdf->SetTextColor(255,109,107);
$pdf->Text(157, 175, $nw['_2_2_7']);
/* --- Text --- */
$pdf->SetFont('sinhala','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(163, 185, 'ms<sld ');
$pdf->SetFont('freeserif','',14);
$pdf->SetTextColor(255,109,107);
$pdf->Text(157, 185, $nw['_2_2_8']);
/* --- Text --- */
$pdf->SetFont('sinhala','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(163, 195, 'jl=.vq frda.h ');
$pdf->SetFont('freeserif','',14);
$pdf->SetTextColor(255,109,107);
$pdf->Text(157, 195, $nw['_2_2_9']);

$pdf->SetFont('sinhala','',12);
$pdf->SetTextColor(0,0,0);
/* --- Text --- */
$pdf->Text(10, 210, 'we& Tn oekg ljr fyda T!IOhla$ m%;sldrhla ,nd .kafka o @ ');
/* --- Text --- */
$pdf->Text(180, 210, $nw['_2_3']);

/* --- Text --- */
$pdf->Text(10, 220, 'wE& Tn Y,Hl¾uhlg Ndckh ù ;sfío @ ');
/* --- Text --- */
$pdf->Text(180, 220, $nw['_2_4']);


/* --- Text --- */
$pdf->Text(12, 230, 'b& f,a oka §fuka miq wo Èk Tng nr jevj, fh§ug fyda u.S m%jdyk jdyk');
$pdf->Text(16, 235, ' meoùu" Wia f.dvke.s,s u; jev lsÍu" l÷ ke.Su" úYd, hkaf;%damlrK');
$pdf->Text(16, 240, '  l%shd lrùu jeks foaj, fh§ug isÿj ;sfí o @ ');
/* --- Text --- */
$pdf->Text(180, 235, $nw['_2_4']);

/* --- Text --- */
$pdf->Text(12, 250, 'B& Tn oekg .¾NŒj isào uõlsß §fuys fhfokafka o miq.sh udi 12 ;=< ');
$pdf->Text(16, 255, ' ore m%iQ;shlg fyda .íid ùulg ,la jQfha o@  ');
/* --- Text --- */
$pdf->Text(180, 250, $nw['_2_4']);





/////////////2nd page

$pdf->addPage();
$pdf->Rect(5, 5, 200, 287 , 'D');

/* --- Text --- */
$pdf->Text(10, 11, '^3& w& flÈkl fyda Tng ly WK$fix.ud,h je,§ ;sfío@ ');
/* --- Text --- */
$pdf->Text(180, 11, $nw['_3_1']);

$pdf->Text(16, 21, 'wd& miq.sh jir 2 ;=< laIh frda.h je<§ ;sfío@ Bg m%;sldr f.k ;sfío@ ');
/* --- Text --- */
$pdf->Text(180, 21, $nw['_3_2']);

$pdf->SetDrawColor(159,159,159);
$pdf->Line(10, 31, 200, 31);
$pdf->SetDrawColor(0);

$pdf->Text(10, 36, '4& miq.sh udi 12 ;=<" ');
/* --- Text --- */


$pdf->Text(16, 46, 'w& Tn m%;sYla;slrK fyda fjk;a tkak;la ,ndf.k ;sfío@ ');
/* --- Text --- */
$pdf->Text(180, 46, $nw['_4_1']);


$pdf->Text(16, 56, 'wd& lka ú§ula"mÉpd flàula fyda lgq Ñls;aid m%;sldrhla isÿlr ;sfío@ ');
/* --- Text --- */
$pdf->Text(180, 56, $nw['_4_2']);

$pdf->Text(16, 66, 'we& nkaOkd.dr.; ù ;sfío@ ');
/* --- Text --- */
$pdf->Text(180, 66, $nw['_4_3']);


$pdf->Text(16, 76, 'wE& Tn fyda Tnf.a iylre$iyldßh úfoaY.; ù ;sfío@  ');
/* --- Text --- */
$pdf->Text(180, 76, $nw['_4_4']);

$pdf->Text(16, 86, 'b& Tng fyda Tnf.a iylre$iyldßhg reêrh fyda reêr fldgia ,nd § ;sfío@ ');
/* --- Text --- */
$pdf->Text(180, 86, $nw['_4_5']);

$pdf->Text(16, 96, 'B& Tng uef,aßhdj je<§ fyda Bg m%;sldr f.k ;sfío@ ');
/* --- Text --- */
$pdf->Text(180, 96, $nw['_4_6']);


$pdf->SetDrawColor(159,159,159);
$pdf->Line(10, 106, 200, 106);
$pdf->SetDrawColor(0);

$pdf->Text(10, 111, '^5& w&miq.sh udi 6 ;=< Tng fvx.= je<§ fyda Bg m%;sldr f.k ;sfío@ ');
/* --- Text --- */
$pdf->Text(180, 111, $nw['_5_1']);

$pdf->Text(16, 121, 'wd& miq.sh udih ;=< -mefmd,"irïm"lïuq,a.dh"refn,a,d WK^c¾uka irïm&');
$pdf->Text(22, 126, ' mdpkh fyda fjk;a l,amj;akd^i;shlg jeä& WKlska fm¿fKao@ ');
/* --- Text --- */
$pdf->Text(180, 125, $nw['_5_2']);

$pdf->Text(16, 136, 'we& miq.sh i;sh ;=,-Tfí o;a .e,ùula isÿlr ;sfío@ ');
/* --- Text --- */
$pdf->Text(180, 136, $nw['_5_3']);

$pdf->Text(16, 146, 'wE& miq.sh i;sh ;=<-Tn m%;sÔjlfyda weiam%Ska fyda^fjk;a& T!IO lsisjla  ');
$pdf->Text(22, 150, ' Ndú;d lf<ao@ ');

/* --- Text --- */
$pdf->Text(180, 147, $nw['_5_4']);

$pdf->SetDrawColor(159,159,159);
$pdf->Line(10, 160, 200, 160);
$pdf->SetDrawColor(0);

$pdf->SetFillColor(255,133,135);
$pdf->Rect(10, 165, 190, 120 , 'FD');

$pdf->Text(11, 170, '^6& w&my; oelafjk ljr fyda ldKavhlg Tn wh;a fõ kï f,a oka§u iqÿiq fkdjk nj  ');
$pdf->Text(18, 175, '  okafkyso@ ');
/* --- Text --- */

$pdf->Text(25, 185, '• Tn taâia fyda fix.ud, wdidOkhlg ,la jQfjl= kï ');
$pdf->Text(25, 193, '• Tfï ,sx.sl in|;d tla wfhl=g iSud ù fkdue;skï  ');
$pdf->Text(25, 201, '• Tn fjk;a msßñfhl= iu. iu,sx.sl weiqrl fh§ we;s msßñfhl= kï  ');
$pdf->Text(25, 209, '• Tn flÈkl fyda u;a øjHhka YÍrhg tkak;a fldg f.k ;sfí kï ');
$pdf->Text(25, 217, '• Tn flÈkl fyda .‚ld jD;a;sfhys fh§ ;sfí kï  ');
$pdf->Text(25, 225, '• Tng miq.sh udi 12 ;=< flÈkl fyda .‚ld weiqrl fh§ ;sfí kï');
$pdf->Text(25, 233, '• Tng fyda Tfí iylre$iyldßhg taâia fyda fjk;a ,sx.sl frda. ');
$pdf->Text(27, 238, ' wdidOkhla ;sfíoehs ielhla we;akï" ');

$pdf->Text(16, 248, 'wd& Tn fyda Tfí iylre$iyldßh by; ioyka ljr fyda ldKavhlg wh;a fõo@');
/* --- Text --- */
$pdf->Text(180, 248, $nw['_5_4']);

$pdf->Text(16, 258, 'we& Tn"isref¾ nr wvq ùulska"l=oaoeá^jid .%kaÓ &"bÈóulska"l,a mj;akd WKlska');
$pdf->Text(22, 263, ' fyda mdpkfhka fmf<ao@   ');
/* --- Text --- */
$pdf->Text(180, 263, $nw['_5_4']);


//////////////////////3rd page

$pdf->addPage();
$pdf->Rect(5, 5, 200, 287 , 'D');

$pdf->Text(10, 16, 'iïmQ¾K ku ( ');
/* --- Text --- */
$pdf->Text(40, 16, $nw['name']);

$pdf->Text(150, 16, 'mqreI $ ia;%S (');
$pdf->Text(155, 21, 'Ndjh');
/* --- Text --- */
$pdf->Text(178, 16, $nw['sex']);

$pdf->Text(10, 26, 'cd;sl ye÷kqïm;a wxlh ( ');
/* --- Text --- */
$pdf->Text(65, 26, $nw['nic']);

$pdf->Text(10, 36, 'ksjfia ,smskh  ( ');
$pdf->Text(10, 41, '^iaÓr$;djld,sl& ');
/* --- Text --- */
$pdf->Text(45, 36, $nw['address']);

$pdf->Text(10, 51, 'úoHq;a ;emE,  ( ');
/* --- Text --- */
$pdf->Text(45, 51, $nw['email']);

$pdf->Text(10, 61, 'ÿrl:k wxlh  ( ');
/* --- Text --- */
$pdf->Text(45, 61, $nw['mobile']);

$pdf->Text(150, 30, 'reêr j¾.h (');
/* --- Text --- */
$pdf->Text(178, 30, $nw['bloodgroup']);

$pdf->Text(165, 40, 'jhi (');
/* --- Text --- */
$pdf->Text(178, 40, $nw['age']); ////////////

$pdf->Text(154, 50, 'Wmka Èkh (');
/* --- Text --- */
$pdf->Text(178, 50, $nw['dob']);

$pdf->SetDrawColor(159,159,159);
$pdf->Line(10, 71, 200, 71);
$pdf->SetDrawColor(0);

$pdf->Text(10, 81, 'reêr odhlhdf.a m%ldYh"');

$pdf->setFontSize(10);
$pdf->Text(17, 91, '• lsisÿ mqoa.,sl ,dNhla wfmalaIdfjka f;drj" iafjÉPdfjka wo Èk ud mß;Hd. lrk reêrh wirK');
$pdf->Text(20, 95, 'frda.Skaf.a hym; fjkqfjka Y%S ,xld cd;sl reêr mdrú,hk fiajhg wjYH whqßka fhdod .ekSug ');
$pdf->Text(20, 99, 'tlÕ;djh m< lrñ');

$pdf->Text(17, 109, '• f,a oka §fï § fukau bka miqj;a ta ms<sn| cd;sl reêr mdrú,hk fiajh Wmfoia wkqj l%shd lrk w;r  ');
$pdf->Text(20, 113, ' tfia fkdlSÍfuka isÿúh yels ydks ms<sn| j.lSu uu ndr .ksñ ');

$pdf->Text(17, 123, '• ;j o ud mß;Hd. lrk reêrh taâia " fymghsàia î iy iS " WmoxYh" uef,aßhdj^Mw,ßwd hk frda.  ');
$pdf->Text(20, 127, ' wdidokhka i|yd fyda cd re md  fiajhg wjYH fjk;a mÍlaIKhka i|yd mÍlaIdjg ,la lsÍug udf.a  ');
$pdf->Text(20, 131, ' tlÕ;djh m< lrñ   ');

$pdf->Text(17, 141, '• tfiau by; mÍlaIKj, m%;sM, cd;sl reêr mdrú,hk fiajhg wjYH wjia:dj,§ ud fj; okajkq ,eîug;a"   ');
$pdf->Text(20, 145, ' t jka wjia:dj,§ cd;sl reêr mdrú,hk fiajh u.ska fokq ,nk jeä ÿr Wmfoia wkqj l%shd lsÍug;a udf.a   ');
$pdf->Text(20, 149, ' leue;a; yd tlÕ;dj m< lrñ ');

$pdf->Text(17, 159, '• fuu m;%sldj lshjd fyd¢ka jgyd .;a w;r by; m%Yakj,g ud úiska imhk ,o ms<s;=re j, i;H;djh .ek  ');
$pdf->Text(20, 163, ' wjxl j iy;sl fjñ  ');

$pdf->Text(17, 173, '• Kav ks;s ix.%yfha 262" 263 j.ka;s wkqj oekqj;aj frda.hla me;srùug lghq;= lsÍu o~qjï ,eìh yels  ');
$pdf->Text(20, 177, ' jrola nj ms<s.ksñ  ');

$pdf->setFontSize(12);
$pdf->Text(10, 187, 'hdjÔj$ksrka;r reêr odhlfhl= jYfhka wirK frda.Ska fjkqfjka bÈßhg;a reêrh mß;Hd.');
$pdf->Text(10, 192, 'lsÍug leue;af;ñ');

$pdf->Text(35, 202, $nw['_7']);


$pdf->Text(20, 265, '---------------------');
$pdf->Text(30, 270, 'w;aik');
$pdf->Text(155, 265, '---------------------');
$pdf->Text(170, 270, 'Èkh');

$pdf->addPage();
$pdf->SetFont('helvetica','',12);
$pdf->writeHTML('	<div  class="menu" >
				<h6>REGISTRATION</h6>
				<p> &nbsp;&nbsp;&nbsp;Above Donor name and ID card number verified?
					Yes<input type="radio"  id="verified" name="verified" value="1" required>&nbsp;
					No<input type="radio" id="verified" name="verified" value="0">
				</p>
				<p> &nbsp;&nbsp;&nbsp;DIN issuing officers Signature: <input class="din" type="text" name="din_name" size="10" value="<?= $this->staff->staff_name?>"></p>
			</div>

			<div class="box">
				<h6>QR Code</h6>
				<img id="img1" style="width:100px" src="data:image/png;base64, <?= $this->qr_image; ?>" alt="">
				
			</div>
			

			<div class="medical">
				<h6>MEDICAL ASSESSMENT</h6>
			</div>

		<div class="mosignature">
			<p>(Medical Officers Signature<input type="text" id="mo_name" name="mo_name" size="40"placeholder=".............................................................................................................................................">)</p>
		</div>
		<div class="box1">
			<label><b>Weight(kg):</b></label>
			<input type="text" id="weight" name="weight"  placeholder="" maxlength="" size="5">
		</div>
');

$pdf->Output('Donor Form.pdf','D');
        

    }


    public function forgetPasswordAction(){
$validation = new Validate();

  if($_POST){

  $validation->check($_POST, [
        
         'donor_email' => [
          'display' => 'Email',
          'not_exists'=> 'donor',
          'valid_email' =>true
          
          ]
      ],false);

       if ($validation->passed()) {
        
        $donor = $this->DonorModel->findByEmail($_POST['donor_email']);
        $donor->hash = getToken(32);
      // dnd($staff->id);
        $this->DonorModel->update($donor->id, $donor);
       $this->DonorModel->forgetPassword($_POST['donor_email'],$donor->hash,$donor->id);

        Router::redirect("home/mailSent?email=".base64_encode($_POST['donor_email'])."");

       }

 // $staff = $this->StaffModel->findbyEmail($_POST['email']);
  }
$this->view->displayErrors = $validation->displayErrors();
  $this->view->render('donor/forgetPassword');
}

public function resetPasswordAction(){
  $id = $_GET['id'];
  $hash = $_GET['hash'];
   $donor = $this->DonorModel->findByID($id);
   $validation = new Validate();
  if($hash == $donor->hash ){

  if($_POST){

    $validation->check($_POST, [
        
        'password' => [
          'display' => 'Password',
          'required' => true ,
          'min' => 6,
        ],
        'confirm' => [
          'display' => 'nic',
          'required' => true ,
          'matches' => 'password',
        ]
      ],false);

       if ($validation->passed()) {

  $donor->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $donor->hash = NULL;
    $this->StaffModel->update($donor->id, $donor);
    }
  }
}else{
  $validation->addError("Something wrong! You can not Change Password Right Now. Please try again Later");
}

$this->view->displayErrors = $validation->displayErrors();
   $this->view->render('donor/resetPassword');
}


}
