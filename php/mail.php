<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "../PHPMailer/Exception.php";
require "../PHPMailer/PHPMailer.php";
require "../PHPMailer/SMTP.php";


// Vérifie si la méthode d'envoi est bien POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupère les données soumises par le formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $evenement = htmlspecialchars($_POST['evenement']);
    $format = htmlspecialchars($_POST['format']);
    $date = htmlspecialchars($_POST['date']);
    $lieux = htmlspecialchars($_POST['lieux']);
    $ville = htmlspecialchars($_POST['ville']);
    $nombre_invites = htmlspecialchars($_POST['nombre_invites']);
    $prestataire = htmlspecialchars($_POST['prestataire']);

    // Crée un nouvel objet PHPMailer
    $mail = new PHPMailer(true);


        //Configure les paramètres SMTP
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'leonelfresnelh@gmail.com'; // Remplacez par votre adresse e-mail
        $mail->Password = 'ftnlkpiyoqilccku'; // Remplacez par votre mot de passe
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        //Configure les destinataires
        $mail->setFrom($email, $nom);
        $mail->addAddress('leonelfresnelh@gmail.com');

        //Configure le contenu du message
        $mail->isHTML(true);
        $mail->Subject = 'Demande d\'événement';
        $mail->Body = "Nom / Nom de la Société : $nom<br>
                        Adresse e-mail : $email<br>
                        Téléphone : $telephone<br>
                        Type d'Événement : $evenement<br>
                        Format de l'Événement : $format<br>
                        Date : $date<br>
                        Lieux : $lieux<br>
                        Ville : $ville<br>
                        Nombre Potentiels d'Invités attendus : $nombre_invites<br>
                        Prestataires : $prestataire";

        // Envoie l'e-mail
        $mail->send();
        echo 
        "
        <script>
        alert('Envoyé avec Succès dans la boite mail');
        document.location.href = '../index.html';
        </script>
        ";
    
    }
?>
