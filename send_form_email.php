<?php
// include 'google_spreadsheet.php';
if(isset($_POST['email'])) {

  //
  // // Zend library include path
  // set_include_path(get_include_path() . PATH_SEPARATOR . "$_SERVER[DOCUMENT_ROOT]/ZendGdata-1.8.1/library");
  // include_once("Google_Spreadsheet.php");
  // $u = "h.lawrence@windowslive.com";
  // $p = "40yearsfromn0W";
  // $ss = new Google_Spreadsheet($u,$p);
  // $ss->useSpreadsheet("My Spreadsheet");
  // // if not setting worksheet, "Sheet1" is assumed
  // // $ss->useWorksheet("worksheetName");
  // $row = array
  // (
  // "name" => "John Doe"
  // , "email" => "john@example.com"
  // , "comments" => "Hello world"
  // );
  // if ($ss->addRow($row)) echo "Form data successfully stored using Google Spreadsheet";
  // else echo "Error, unable to store spreadsheet data";


    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "h.lawrence@windowslive.com";

    $email_subject = "Someone signed up to your form";





    function died($error) {

        // your error code can go here

        echo "We are very sorry, but there were error(s) found with the form you submitted. ";

        echo "These errors appear below.<br /><br />";

        echo $error."<br /><br />";

        echo "Please go back and fix these errors.<br /><br />";

        die();

    }



    // validation expected data exists

    if( !isset($_POST['email'])) {

        died('We are sorry, but there appears to be a problem with the form you submitted.');

    }


    $email_from = $_POST['email']; // required

    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {

    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';

  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(strlen($error_message) > 0) {

    died($error_message);

  }

    $email_message = "Dear admin,\n\n";
    $email_message = "A user completed your form. The details are below:\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }

    $email_message .= "Email: ".clean_string($email_from)."\n";

// create email headers

$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

?>



<!-- include your own success html here -->



Thank you for contacting us. We will be in touch with you very soon.



<?php

}

?>
