<?php

/**
 *
 */
class UserSessions extends Model
{
  public $id, $user_id, $session, $user_agent;
  public function __construct()
  {
    $table = 'user_sessions';
    parent::__construct($table);
  }

  //   public static function getFromCookie()
  //   {
  //     if (COOCKIE::exists(REMEBER_ME_COOCKIE_NAME)) {
  //       $userSession = new self();
  //       $userSession = $UserSessions->findFirst([
  //         'conditions' => "user_agent = ? AND session",
  //         'bind' => [Session::uagent_no_version(), COOKIE::get(REMEBER_ME_COOCKIE_NAME)]
  //       ]);
  //     }
  // if (!$userSession) return false;
  //   return $userSession;


  //}
}
