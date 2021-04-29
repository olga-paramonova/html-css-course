<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="description" content="Example contact form">
    <meta name="keywords" content="VICOM-128, HTML Contact Form">
	<title>Contact Form</title>
    <link rel="shortcut icon" href="images/Zoo-logo_sloth.png">
    <link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/contact.css">
</head>

<body>
	    <h1>Email Confirmation</h1>
	    <div>
	                <fieldset>
                     	<legend>Contact Information</legend>
                 		<label for="first_name">First Name:</label>
             			<input type="text" name="first_name" id="first_name" value="<?php echo $_REQUEST['first_name'] ?>" disabled><br>
             			<label for="last_name">Last Name:</label>
             			<input type="text" name="last_name" id="last_name" value="<?php echo $_REQUEST['last_name'] ?>" disabled><br>
                     	<label for="email">Email Address:</label>
                     	<input type="email" name="email" id="email" value="<?php echo $_REQUEST['email'] ?>" disabled><br>
                     	<label for="verify">Verify Email:</label>
                     	<input type="email" name="verify" id="verify" value="<?php echo $_REQUEST['email'] ?>" disabled><br>
             			<label for="phone">Phone Number:</label>
             			<input type="tel" name="phone" id="phone" value="<?php echo $_REQUEST['phone'] ?>" disabled><br>
             		</fieldset>
             		<fieldset>
                 		<legend>Message Information</legend>
             			<label for="event_date">Event Date:</label>
             			<input type="date" name="event_date" id="event_date" value="<?php echo $_REQUEST['event_date'] ?>" disabled><br>
             			<label for="occasion">Occasion:</label>
             			<input type="text" name="occasion" id="occasion" value="<?php echo $_REQUEST['occasion'] ?>" disabled><br>
             			<label for="number_of_people">Number of People:</label>
                         			<input type="text" name="number_of_people" id="number_of_people" value="<?php echo $_REQUEST['number_of_people'] ?>" disabled><br>
             			<label for="Message">Message:</label>
             			<textarea id="message" name="message" rows="4" disabled><?php echo $_REQUEST['message'] ?></textarea>
             		</fieldset>
        </div>

<!-- This entire script, including the opening and closing ?php tags, can be nested inside of any other tag,
such as div or p, to control positioning and formatting of confirmation message spit out by the email script -->
<h2>
<?php
  if (isset($_REQUEST['email'])) { //if "email" variable is filled out, send email
  
  //Set admin email for email to be sent to (use you own MATC email address)
    $admin_email = "Paramano@gmatc.matc.edu";

  //Set PHP variable equal to information completed on the HTML form
    $email = $_REQUEST['email']; //Request email that user typed on HTML form
    $phone = $_REQUEST['phone']; //Request phone that user typed on HTML form
    $event_date = $_REQUEST['event_date']; //Request subject that user typed on HTML form
    $occasion = $_REQUEST['occasion']; //Request subject that user typed on HTML form
    $number_of_people = $_REQUEST['number_of_people'];
    $message = $_REQUEST['message']; //Request message that user typed on HTML form
  //Combine first name and last name, adding a space in between
    $name = $_REQUEST['first_name'] . " " .  $_REQUEST['last_name']; 
            
  //Start building the email body combining multiple values from HTML form    
    $body  = "From: " . $name . "\n"; 
    $body .= "Email: " . $email . "\n"; //Continue the email body
    $body .= "Phone: " . $phone . "\n"; //Continue the email body
    $body .= "Event Date: " . $event_date . "\n"; //Continue the email body
    $body .= "Occasion: " . $occasion . "\n";
    $body .= "Number of people: " . $number_of_people . "\n";
    $body .= "Message: " . $message; //Continue the email body
  
  //Create the email headers for the from and CC fields of the email     
    $headers = "From: " . $name . " <" . $email . "> \r\n"; //Create email "from"
    $headers .= "CC: " . $name . " <" . $email . ">"; //Send CC to visitor
    
  //Actually send the email from the web server using the PHP mail function
  mail($admin_email, $subject, $body, $headers); 
    
  //Display email confirmation response on the screen
  echo "Thank you for contacting us!"; 
  }
  
  //if "email" variable is not filled out, display an error
  else  { 
     echo "There has been an error!";
        }
?>

</h2>
</body>
</html>