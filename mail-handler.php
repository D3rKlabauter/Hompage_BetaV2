<?php
/* 
if($_POST["contact-project"]) {
    $headers = "From: " . $_POST["contact-email"] . "\r\n";
    $headers .= "Content-type:text/plain" . "\r\n";
    
    mail("edwin.lang@aon.at", "Portfolio Homepage 2022", $_POST["contact-project"],  $headers);

} */
echo 'vor mailpruefung' . '<br>';
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

echo 'vor mailversand';

if( empty($errors))
{
    $to = $myemail;
    $email_subject = "Contact form submission: $name";
    $email_body = "You have received a new message. ".
    " Here are the details:\n Name: $name \n ".
    "Email: $email_address\n Message \n $message";
    $headers = "From: $myemail\r\n";
    $headers .= "Reply-To: $email_address";
    mail($to,$email_subject,$email_body,$headers);
    //redirect to the 'thank you' page
    	header('Content-Type: text/html');
	header('Location: https://d3rklabauter.github.io/index.html');
	exit;
}


?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset=UTF-8>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
echo 'servas body';
?>

</body>
</html>
