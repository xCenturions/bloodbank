<?php
//this library assumes that the HTML form will be submitted using the POST method, with the following fields:
/*
* 'submit' for the submit button
* 'email' for the user's email address
* 'password' for the user's password
*/
//assuming that the mySQL table has the following columns:
/*
* a column for id (index number) with name specified below
* a column for emails with name specified below
* a column for passwords with name specified below
* a column for the confirmation hash generated with name specified below
* a column for the verification status of user with name specified below
*/
//Note: This library also requires PHPMailer which you can download from here.
$siteURL = 'https://localhost/bloodbank/';
$PHPMailerAutoloadPath = 'C:\xampp\htdocs\bloodbank\app\lib\Email\vendor\autoload.php'; //enter the complete filepath to PHPMailer's 'PHPMailerAutoload.php' file if you have already installed PHPMailer. Leave blank if you have downloaded PHPMailer with this library.
$databaseIP = 'localhost'; //IP Address of SQL database you wish to work with. Enter localhost if it is hosted on same server as website.
$databaseName = 'bloodbank_db';
$databaseUsername = 'root'; //username to login to the SQL Database
$databasePassword = ''; //password to login to the SQL Database
$tableName = 'donor'; //store the name of the table in the database into which you wish to insert users.
$emailColumnName = 'donor_email'; //store the name of the user email column in the above table.
$passwordColumnName = 'password'; //store the name of the user password column in the above table.
$idColumnName = 'id'; //store the name of the user ID column in the above table.
$confirmationHashColumnName = 'verification_code'; //store the name of the column used to store confirmation hashes.
$verificationStatusColumnName = 'is_active';//store the name of the column used to store verification status (unverified/confirmed/etc.).
//Settings for the confirmatory email to be sent:
$fromEmailID = 'tharindumaduranga977@gmail.com'; //confirmation email will be sent from this email.
$fromName = 'Blood bank Management System'; //name that will dispay as the sender of confirmation email.
$subject = 'Verify Your Account'; //subject for the confrimation email.
$subject2 = 'Request To Donate Blood'; //subject for the confrimation email.

//you can modify the body of the email address in the script 'signup.php'.

//LOGIN DETAILS FOR FROM Email ID: Settings to be taken from Email Provider.
$mailHost = 'smtp.gmail.com'; //specify main and backup SMTP mail servers.
$mailUsername = 'tharindumaduranga977@gmail.com'; //usually the email address, but check with Email provider.
$mailPassword = 'Madu9663*'; //password used to login to email ID.
$mailEncryptionType = 'tls'; //enter ssl or tsl.
$mailPortNumber = 587; //usually 587 for TSL. But find the recommended settings from your email provider.

//optional settings. Leave blank if not required.
$replyToEmailID = ''; //if user replies to confirmation email, email id to recieve that message.
$BCCEmailID = ''; //BCC of confirmation email to be sent to this email address.
?>
