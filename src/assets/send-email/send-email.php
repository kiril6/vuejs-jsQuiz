<?php
    // My modifications to mailer script from:
    // http://blog.teamtreehouse.com/create-ajax-contact-form
    // Added input sanitizing to prevent injection

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = 'Sent from email : '. $email;
        
        // Check that data was sent to the mailer.
        if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }
	
        // Set the recipient email address.
        $recipient = "delovski.office@gmail.com";

        // Set the email subject.
        $subject = "js-quiz subscriber from: ".$email;

        // Build the email content.
		
        $email_content = "Email: $email\n\n";
	    $email_content .= "IpAddress:\n" .$_SERVER['REMOTE_ADDR'] . "\n";	

        // Build the email headers.
        $email_headers = "From: $name <$email>";
		//$email_respond = "Your email has been received|";
		
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);			   			
            echo "Thank You! Your message has been sent.";		
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }
	} else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
?>
