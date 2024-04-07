<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'fajarrkim@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  $contact->invalid_to_email = 'Email to (receiving email address) is empty or invalid!';
  $contact->invalid_from_name = 'From Name is empty!';
  $contact->invalid_from_email = 'Email from: is empty or invalid!';
  $contact->invalid_subject = 'Subject is too short or empty!';
  $contact->short = 'is too short or empty!'; // If the length check number is set and the provided message text is under the set length in the add_message() method call
  $contact->ajax_error = 'Sorry, the request should be an Ajax POST'; // If ajax property is set true and the post method is not an AJAX call

  echo $contact->send();

  if($_POST['privacy'] !='accept') {
    die('Please, accept our terms of service and privacy acy policy');
  }
?>
