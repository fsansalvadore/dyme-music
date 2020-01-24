<?php
$errors = '';
$myemail = 'dyme.music@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['tipologia']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name'];
$business = $_POST['business'];
$email_address = $_POST['email'];
$tel = $_POST['tel'];
$type = $_POST['tipologia'];
$formation = $_POST['formation'];
$message = $_POST['textarea1'];
$altro = $_POST['altro'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))

{
$to = $myemail;
$email_subject = "DYME | Richiesta preventivo da: $name";
$email_body = "Nuova richiesta di preventivo da: \n \n Nome: $name \n ".
"Azienda: $business\n ".
"Email: $email_address\n ".
"Telefono: $tel\n ".
"Tipologia di evento: $type\n ".
"Formazione richiesta: $formation\n ".
"Messaggio: \n $message\n".
"Altro: \n $altro";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: thank-you-quotation.html');
}
?>
