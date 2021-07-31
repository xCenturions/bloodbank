<?php
define('DEBUG' , true);

define('DB_NAME' , 'bloodbank_db');
define('DB_USER' , 'root');
define('DB_PASSWORD' , '');
define('DB_HOST' , '127.0.0.1');

define('DEFAULT_CONTROLLER', 'Home'); // default controller is there isn't one defined in the url
define('DEFAULT_LAYOUT', 'default'); //if no layout is set in the controller use this layout

define('PROOT', '/bloodbank/'); // set this ti '/' for a alive server

define('SITE_TITLE', 'R MVC FRAMEWORK'); // This will be used if no site titile is set
define('MENU_BRAND', 'RUH'); // menue name
define('CURRENT_USER_SESSION_NAME', 'qwaserfcvbhytgIKMNHFY'); //session name for logged in user
define('ADMIN_SESSION_NAME', 'abcdefghsrttHGKGJHGJH'); // ADmin session name
define('STAFF_SESSION_NAME', 'pqrstfghsrttHGKGJHGJH'); // staff session name
define('REMEBER_ME_COOCKIE_NAME', 'JKJGRTSVBE534sdfibkD'); //cookie name for logged user
define('REMEBER_ME_COOCKIE_EXPIRY', 2592000); //time in second for me cookie to live 30 days

define('ACCESS_RESTRICTED', 'Restricted'); //controller name for the restricted redirerct
