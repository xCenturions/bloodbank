<?php

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

function get_times ($default = '19:00', $interval = '+30 minutes') {

    $output = '';

    $current = strtotime('00:00');
    $end = strtotime('23:59');

    while ($current <= $end) {
        $time = date('H:i', $current);
        $sel = ($time == $default) ? ' selected' : '';

        $output .= "<option value=\"{$time}\"{$sel}>" . date('h.i A', $current) .'</option>';
        $current = strtotime($interval, $current);
    }

    return $output;
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