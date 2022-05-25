<?php
/* 
if($_POST["contact-project"]) {
    $headers = "From: " . $_POST["contact-email"] . "\r\n";
    $headers .= "Content-type:text/plain" . "\r\n";
    
    mail("edwin.lang@aon.at", "Portfolio Homepage 2022", $_POST["contact-project"],  $headers);

} */

$errors = '';
$myemail = 'edwin.lang@aon.at';//<-----Put Your email address here.
if(empty($_POST['contact-name'])  ||
   empty($_POST['contact-email']) ||
   empty($_POST['contact-project']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['contact-name'];
$email_address = $_POST['contact-email'];
$message = $_POST['contact-project'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
    $to = $myemail;
    $email_subject = "Contact form submission: $name";
    $email_body = "You have received a new message. ".
    " Here are the details:\n Name: $name \n ".
    "Email: $email_address\n Message \n $message";
    $headers = "From: $myemail\n";
    $headers .= "Reply-To: $email_address";
    mail($to,$email_subject,$email_body,$headers);
    //redirect to the 'thank you' page
    header('Location: index.html\n');
}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>
