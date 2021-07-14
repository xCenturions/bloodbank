<?php

function inputBlock($type, $lable , $name, $value='', $inputAttrs=[], $divAttrs=[]){
  $divString = stringfyAttrs($divAttrs);
  $inputString = stringfyAttrs($inputAttrs);
  $html = '<div' . $divString . '>';
  $html .= '<label for="'.$name.'">'.$lable.'</label>';
  $html .= '<input type="'.$type.'" id="'.$name.'" name="'.$name.'" value="'.$value.'"'.$inputString.' />';
  $html .= '</div>';
  return $html;
}

function submitTag($buttonText, $inputAttrs=[], $divAttrs=[]){
  $inputString = stringfyAttrs($inputAttrs);
  $html = '<input type="submit" value="'.$buttonText.'"'.$inputString.' />';
  return $html;
}

function submitBlock($buttonText, $inputAttrs=[], $divAttrs=[]){
  $divString = stringfyAttrs($divAttrs);
  $inputString = stringfyAttrs($inputAttrs);
  $html = '<div'.$divString.'>';
  $html .= '<input type="submit" value="'.$buttonText.'"'.$inputString.' />';
  $html .= '</div>';
  return $html;
}

function stringfyAttrs($attrs){
  $string = '';
  foreach ($attrs as $key => $val) {
    $string .= ' ' . $key . '="' . $val . '"';
  }
  return $string;
}
