<?php
$errors = '';
$myemail = 'dyme.music@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  ||
   empty($_POST['lastname'])  ||
   empty($_POST['email']) ||
   empty($_POST['message']) ||
   empty($_POST['region']) ||
   empty($_POST['genre']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email_address = $_POST['email'];
$genre = $_POST['genre'];
$message = $_POST['message'];
$region = $_POST['region'];
$link1 = $_POST['link1'];
$link2 = $_POST['link2'];
$link3 = $_POST['link3'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))

{
$to = $myemail;
$email_subject = "DYME | Richiesta artista: $name";
$email_body = "Nuova richiesta di collaborazione da: \n \n Nome: $name \n ".
"Cognome: $lastname\n ".
"Email: $email_address\n ".
"Genere musicale: $genre\n ".
"Breve descrizione: \n $message\n ".
"Link: \n$link1\n$link2\n$link3\n ";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: thank-you-artist.html');
}
?>
