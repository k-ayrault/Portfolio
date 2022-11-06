<?php

switch($_SERVER['REQUEST_METHOD']){
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

    $to = 'kevin.ayrault87@gmail.com';
    $sujet = 'Nouveau message : kayrault.fr';
    $headers = "From: $nomPrenom <$email>";

    $message = "Nouveau message de $nomPrenom ($email) :
     $params->message";

    mail($to, $sujet  , $message, $headers);
    break;
  default: //Reject any non POST or OPTIONS requests.
    header("Allow: POST", true, 405);
    exit;
}
?>
