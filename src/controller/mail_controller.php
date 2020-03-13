<?php

session_start();

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../../vendor/PHPMailer/src/Exception.php';
require '../../vendor/PHPMailer/src/PHPMailer.php';
require '../../vendor/PHPMailer/src/SMTP.php';
// Load Composer's autoloader
require '../../vendor/autoload.php';

if (isset($_SESSION['favorites']) &&  $_SESSION['favorites'] !== "")
{
    $favorites = $_SESSION['favorites'];
    $pokemonFavoriteArray = explode(",", $favorites);
    $favorites = [];
    foreach ($pokemonFavoriteArray as $item) {
        array_push($favorites,'https://www.pokemon.com/nl/pokedex/'. urlencode($item));
    }
    $counter = count($favorites);
    $url = "";
    for ($i = 0; $i<$counter; $i++){
        $url .= "<a href='".strtolower($favorites[$i])."'>Pokemon".$i."</a><br/>";
    }

}else {
    $_SESSION['error_message']= "There are no favorite Pokemons Set";
}

$subject = 'Pokemon Favorites';
$email = $_SESSION["email"];
$message = "<p>Dear Friend</p></br><p>Look at this pokemon(s), it is so cool!</p></br>".$url;

$email = filter_var($email, FILTER_SANITIZE_EMAIL);


//$html = "Dear ".$name ."\n"."<html><body><br><br></body></html>". $email ." sends you a greetingcard"."<html><body><br><a href=\""
//    . $url . "\">View your card!</a><br><br><em>Seasonal Greetings is a tool made by ED Web&Photo STUDIO. Please try it and send us feedback.</em></body></html>";



// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '36fd744cd7a81a';                     // SMTP username
    $mail->Password   = '97a5c8955dd414';                               // SMTP password
    $mail->SMTPSecure = 'tSL';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 25;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail->setFrom('danny.eeraerts@proximus.be', 'Danny Eeraerts');
    $mail->addAddress('danny-f8e686@inbox.mailtrap.io', 'Danny Eeraerts');     // Add a recipient
    $mail->addAddress('danny-f8e686@inbox.mailtrap.io');               // Name is optional
//  $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');
// Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML en not text
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    $_SESSION['success_message'] = 'Message has been sent';
    header("Location: /PokemonOOP/public/index.php");
    exit();

} catch (Exception $e) {
    $_SESSION['error_message'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header("Location: /PokemonOOP/public/index.php");
    exit();
}
