<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'ramdevops2005@gmail.com';

// Check if the library exists
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

// Create a new PHP_Email_Form instance
$contact = new PHP_Email_Form;
$contact->ajax = true;

// Configure email details
$contact->to = $receiving_email_address;
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : '';
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : '';
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : '';

// Uncomment the SMTP section if you want to use SMTP to send emails.
// You need to enter your correct SMTP credentials.
$contact->smtp = array(
    'host' => 'smtp.example.com', // Replace with your SMTP host
    'username' => 'ramdevops2005@gmail.com', // Replace with your SMTP username
    'password' => 'Ram@Devops2005', // Replace with your SMTP password
    'port' => '465', // Common SMTP ports: 587 (TLS) or 465 (SSL)
);

// Add messages
$contact->add_message($_POST['name'] ?? '', 'From');
$contact->add_message($_POST['email'] ?? '', 'Email');
$contact->add_message($_POST['message'] ?? '', 'Message', 10);

// Send the email and echo the result
echo $contact->send();
?>
