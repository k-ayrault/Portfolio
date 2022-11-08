<?php


switch ($_SERVER['REQUEST_METHOD']) {
  case("OPTIONS"): //Allow preflighting to take place.
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: content-type");
    exit;
  case("POST"): //Send the email;
    header("Access-Control-Allow-Origin: *");

    $json = file_get_contents('php://input');

    $params = json_decode($json);

    $email = $params->mail;
    $nomPrenom = "$params->nom $params->prenom";
    $societe = $params->societe;

    $to = 'kevin.ayrault87@gmail.com';
    $sujet = 'Nouveau message : kayrault.fr';

    $message = $params->message;


// Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
    $headers .= 'From: ' . $nomPrenom . '<' . $email . '>' . "\r\n";

    $formatter = new \IntlDateFormatter(
      'fr_FR',
      IntlDateFormatter::FULL,
      IntlDateFormatter::FULL,
      'Europe/Paris',
      null,
      'dd MMMM YYYY à HH:mm'
    );
    $date = $formatter->format(time());

    $content = file_get_contents("./template.mail.html");
    $content = str_replace("{{personne}}", $nomPrenom, $content);
    $content = str_replace("{{mail}}", $email, $content);
    $content = str_replace("{{date}}", $date, $content);
    $content = str_replace("{{societe}}", $societe != "" ? "🏢 $societe" : "", $content);
    $content = str_replace("{{message}}", $message, $content);

    mail($to, $sujet, $content, $headers);
    break;
  default: //Reject any non POST or OPTIONS requests.
    header("Allow: POST", true, 405);
    exit;
}
?>
