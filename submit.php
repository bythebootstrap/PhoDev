<?php

// If nothing is in URL field...
if (empty($url)) {
	
	// put your email address here
	$youremail = 'phofillingco@gmail.com';

	// prepare a "pretty" version of the message
	// Important: if you added any form fields to the HTML, you will need to add them here also
	$body = "This is the form that was just submitted:
	Name:  $_POST[name]
	E-Mail: $_POST[email]
    Message: $_POST[message]";
        
	// Use the submitters email if they supplied one
	// (and it isn't trying to hack your form).
	// Otherwise send from your email address.
	if( $_POST['email'] && !preg_match( "/[\r\n]/", $_POST['email']) ) {
	  $headers = "From: $_POST[email]";
	} else {
	  $headers = "From: $youremail";
	}
     
	// finally, send the message
	mail($youremail, 'Contact Form', $body, $headers );

}
// otherwise, let the spammer think that they got their message through
header('Location: index.html');
?>
