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
