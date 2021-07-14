<?php

class FH {

  public static function inputBlock($type, $lable , $name, $value='', $inputAttrs=[], $divAttrs=[]){
    $divString = self::stringfyAttrs($divAttrs);
    $inputString = self::stringfyAttrs($inputAttrs);
    $html = '<div' . $divString . '>';
    $html .= '<label for="'.$name.'">'.$lable.'</label>';
    $html .= '<input type="'.$type.'" id="'.$name.'" name="'.$name.'" value="'.$value.'"'.$inputString.' />';
    $html .= '</div>';
    return $html;
  }

    public static function submitTag($buttonText, $inputAttrs=[], $divAttrs=[]){
    $inputString = self::stringfyAttrs($inputAttrs);
    $html = '<input type="submit" value="'.$buttonText.'"'.$inputString.' />';
    return $html;
  }

    public static function submitBlock($buttonText, $inputAttrs=[], $divAttrs=[]){
    $divString = self::stringfyAttrs($divAttrs);
    $inputString = self::stringfyAttrs($inputAttrs);
    $html = '<div'.$divString.'>';
    $html .= '<input type="submit" value="'.$buttonText.'"'.$inputString.' />';
    $html .= '</div>';
    return $html;
  }

    public static function stringfyAttrs($attrs){
    $string = '';
    foreach ($attrs as $key => $val) {
      $string .= ' ' . $key . '="' . $val . '"';
    }
    return $string;
  }

  public static function generateToken()
  {
    $token = base64_encode(openssl_random_pseudo_bytes(32));
    Session::set('csrf_token',$token);
    return $token;
  }

  public static function checkToken($token)
  {
    return (Session::exists('csrf_token') && Session::get('csrf_token') == $token);
  }

  public static function csrfInput()
  {
    return '<input type="hidden" name="csrf_token" value="'.self::generateToken().'" />';
  }

}
