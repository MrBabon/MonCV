<?php
$array = array(
    "firstname" => "",
    "name" => "",
    "email" => "",
    "phone" => "",
    "message" => "",
    "firstnameError" => "",
    "nameError" => "",
    "emailError" => "",
    "phoneError" => "",
    "messageError" => "",
    "isSuccess" => false
);

$emailTo = "christophedanna06@gmail.com";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $array["firstname"] = verifyInput($_POST["firstname"]);
    $array["name"] = verifyInput($_POST["name"]);
    $array["email"] = verifyInput($_POST["email"]);
    $array["phone"] = verifyInput($_POST["phone"]);
    $array["message"] = verifyInput($_POST["message"]);
    $array["isSuccess"] = true;
    $emailText = "";

    if (empty($array["firstname"])) {
        $array["firstnameError"] = "Veuillez indiquer votre prénom.";
        $array["isSuccess"] = false;
    } else {
        $emailText .= "Prénom : {$array["firstname"]}\n";
    }

    if (empty($array["name"])) {
        $array["nameError"] = "Veuillez indiquer votre nom.";
        $array["isSuccess"] = false;
    } else {
        $emailText .= "Nom : {$array["name"]}\n";
    }

    if (!isEmail($array["email"])) {
        $array["emailError"] = "Veuillez fournir une adresse e-mail valide.";
        $array["isSuccess"] = false;
    } else {
        $emailText .= "Email : {$array["email"]}\n";
    }

    if (!isPhone($array["phone"])) {
        $array["phoneError"] = "Veuillez entrer un numéro de téléphone valide contenant uniquement des chiffres et des espaces.";
        $array["isSuccess"] = false;
    } else {
        $emailText .= "Téléphone : {$array["phone"]}\n";
    }

    if (empty($array["message"])) {
        $array["messageError"] = "Veuillez entrer votre message.";
        $array["isSuccess"] = false;
    } else {
        $emailText .= "Message : {$array["message"]}\n";
    }

    if ($array["isSuccess"]) {
        // Utilisation de la bibliothèque PHPMailer pour l'envoi d'e-mails
        require 'path/to/PHPMailer/PHPMailer.php';
        require 'path/to/PHPMailer/SMTP.php';
        require 'path/to/PHPMailer/Exception.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // Configuration du serveur SMTP (exemple pour Gmail)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com';
        $mail->Password = 'your-email-password';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configuration de l'expéditeur et du destinataire
        $mail->setFrom($array["email"], "{$array["firstname"]} {$array["name"]}");
        $mail->addAddress($emailTo);

        // Sujet et corps de l'e-mail
        $mail->Subject = 'Un message de votre


    // POUR SECURISER LE SITE

    function verifyInput($var)
    {
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }
    ?>
