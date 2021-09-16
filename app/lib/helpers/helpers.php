<?php
use PHPMailer\PHPMailer\PHPMailer;
function dnd($data){
  echo '<pre>';
  var_dump($data);
  echo '</pre>';
  die();
}

function sanitize($dirty){
  return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
}

function currentUser()
{
  
  return Donor::currentLoggedInUser();
  
}

function admin() {

  return Admin::currentLoggedInUser();
}

function staff() {

  return Staff::currentLoggedInUser();
}

function displayRole(){

    if(Session::exists(STAFF_SESSION_NAME)){

      return 'Hello Doctor';
    }
  }


function posted_values($post){
  $clean_ary = [];
  foreach ($post as $key => $value) {
    $clean_ary[$key] = sanitize($value);
  }
  return $clean_ary;
}

function currentPage(){
  $currentPage = $_SERVER['REQUEST_URI'];
  if ($currentPage == PROOT || $currentPage == PROOT.'home/index') {
    $currentPage = PROOT . 'home';
  }
  return $currentPage;
}

function getObjectProperties($obj){
  
  return get_object_vars($obj);
}

function get_times ($default = '08:00', $interval = '+60 minutes') {

    $output = '';

    $current = strtotime('08:00');
    $end = strtotime('18:59');

    while ($current <= $end) {
        $time = date('H:i', $current);
        $sel = ($time == $default) ? ' selected' : '';

        $output .= "<option value=\"{$time}\"{$sel}>" . date('h.i A', $current) .'</option>';
        $current = strtotime($interval, $current);
    }

    return $output;
}

 function validateAge($then)
                              {
                                  // $then will first be a string-date
                                  $then = strtotime($then);
                                  //The age to be over, over +18
                                  $min = strtotime('+18 years', $then);
                                  //echo $min;
                                   if(time() < $min)   {
                                      return true;
                                  }
                               
                                  
                              }




 
// function locTypeDrop()
// {
//   $output = '';
//   $sql = "SELECT * FROM location WHERE cid='" . $_POST['typeID'] . "' ORDER BY nearest_location";
//   dnd($sql);
//   $output .= '<option value="" disabled="" selected="">Find Nearest Location</option>';

//   //while ($row = mysqli_fetch_array($result)) {
//     $output .= '<option value="' . $row["id"] . '">' . $row['nearest_location'] . '</option>';
//   // }//
  

//   return $output;
// }

// // function nearLocDrop()
// // {
// //                     $output = '';
// // 										$sql= "SELECT * FROM  type ORDER BY location_type";
// //                     $result = mysqli_query($conn, $sql);
// //                     $output .= '<option value="" disabled="" selected="">Find Nearest Location</option>';
// // 										while($row=mysqli_fetch_array($result)){

// //                     $output .=	'<option value="' . $row["id"] . '">' . $row['location_type'] . '</option>';

// //                     }

// //                     return $output;
								 
// // }


function getToken($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet) - 1;
    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max)];
    }
    return $token;
}

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd >= $range);
    return $min + $rnd;
}


function sendConfirmationMail($toEmail, $emailBody, $emailAltBody)
{
  include(ROOT . DS . 'app' . DS . 'lib' . DS . 'Email' . DS . 'settings.php');
  include(ROOT . DS . 'app' . DS . 'lib' . DS . 'Email' . DS  .'vendor' . DS . 'autoload.php');

  //dnd($toEmail);

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = $mailHost;
  
 
  $mail->SMTPAuth = true;
  $mail->Username = $mailUsername;
  $mail->Password = $mailPassword;
  $mail->SMTPSecure = $mailEncryptionType;
  $mail->Port = $mailPortNumber;

  $mail->setFrom($fromEmailID, $fromName);
  $mail->addAddress($toEmail);

  if($replyToEmailID)
  $mail->addReplyTo($replyToEmailID);

  if($BCCEmailID)
  $mail->addBCC($BCCEmailID);



  $mail->isHTML(true);

  $mail->Subject = $subject;
  $mail->Body    = $emailBody;
  $mail->AltBody = $emailAltBody;

  if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      echo 'Message has been sent. Please check your inbox and spam folder.';
  }

  
}

function countMessage(){

        $message = "SELECT status  , count(*) as count FROM contactus WHERE status = 'unopened' GROUP BY status   ";  
         $db = DB::getInstance();
         $results = $db->query($message,[])->results();
     // dnd($results);

    if(empty($results)){

         return null;
       
    }else{
      return $results[0]->count;
    }

  }


    function sendMail($toEmail, $emailBody, $emailAltBody)
{
  include(ROOT . DS . 'app' . DS . 'lib' . DS . 'Email' . DS . 'settings.php');
  include(ROOT . DS . 'app' . DS . 'lib' . DS . 'Email' . DS  .'vendor' . DS . 'autoload.php');

  //dnd($toEmail);

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = $mailHost;
  
 
  $mail->SMTPAuth = true;
  $mail->Username = $mailUsername;
  $mail->Password = $mailPassword;
  $mail->SMTPSecure = $mailEncryptionType;
  $mail->Port = $mailPortNumber;

  $mail->setFrom($fromEmailID, $fromName);
  $mail->addAddress($toEmail);

  if($replyToEmailID)
  $mail->addReplyTo($replyToEmailID);

  if($BCCEmailID)
  $mail->addBCC($BCCEmailID);



  $mail->isHTML(true);

  $mail->Subject = $subject2;
  $mail->Body    = $emailBody;
  $mail->AltBody = $emailAltBody;

  if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      //echo 'Message has been sent. Please check your inbox and spam folder.';
  }
}
 