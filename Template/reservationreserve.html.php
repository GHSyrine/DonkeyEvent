<?php
include 'Template/header.html.php';
?>

<h1>Réservation</h1>
<h2>Vous allez recevoir un email qui récapitule votre réservation à l'adresse que vous avez renseignée.</h2>

<a href="/reservation/one/<?= $data["orderNum"] ?>">Afficher le reçu de la réservation</a>

<?php
// qr code

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

require_once '../DonkeyEvent/vendor/autoload.php';

$writer = new PngWriter();

// Create QR code
$qrCode = QrCode::create("Votre numéro de commande est le : ".$data["orderNum"]." Merci de le conserver ainsi que l'email pour retirer vos places. Rendez vous à cette addresse pour voir le résumer de votre réservation : http://localhost:8000/reservation/one/".$data["orderNum"].".")
    ->setEncoding(new Encoding('UTF-8'))
    ->setErrorCorrectionLevel(ErrorCorrectionLevel::High)
    ->setSize(300)
    ->setMargin(10)
    ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
    ->setForegroundColor(new Color(0, 0, 0))
    ->setBackgroundColor(new Color(255, 255, 255));

$result = $writer->write($qrCode, null, null);

// Save it to a file
$result->saveToFile("../DonkeyEvent/images/qrcode/qr-code-".$data["orderNum"].".png");

// Generate a data URI to include image data inline (i.e. inside an <img> tag)
$dataUri = $result->getDataUri();
$name = "/images/qrcode/qr-code-".$data["orderNum"].".png";
?>
<img src=<?=$name?> alt='qr-code'>
<?php

// email

define('GMailUSER', 'testtempmail54@gmail.com'); // utilisateur Gmail
define('GMailPWD', 'ybidvdlhehmpfjye'); // Mot de passe Gmail
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 
 
// Include library files 
require_once 'vendor\phpmailer\phpmailer\src\Exception.php'; 
require_once 'vendor\phpmailer\phpmailer\src\PHPMailer.php'; 
require_once 'vendor\phpmailer\phpmailer\src\SMTP.php'; 
 
function smtpMailer($to, $from, $from_name, $subject, $body) {
	$mail = new PHPMailer();  // Cree un nouvel objet PHPMailer
	$mail->IsSMTP(); // active SMTP
    $mail->CharSet = 'UTF-8';
	$mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
	$mail->SMTPAuth = true;  // Authentification SMTP active
	$mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = GMailUSER;
	$mail->Password = GMailPWD;
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
    $mail->isHTML(true);
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		return 'Mail error: '.$mail->ErrorInfo;
	} else {
		return true;
	}
}

$subject = 'Justificatif de la réservation Numéro : N1';
$body = '<h1>Voici le détail de votre réservation</h1> <hr /> <br> <br> <h2>Numéro de réservation : </h2> <b>'.$data["orderNum"].'</b> <br> <br> Le présent email sert de justificatif lors de votre passage en caisse. <br> Merci de le garder précieusement. <br> <br> <br> <br> <h2>Pathé Cinéma</h2>';

$result = smtpmailer($data["email"], 'testtempmail54@gmail.com', 'Cinéma Pathy', $subject, $body);
if (true !== $result)
{
	// erreur -- traiter l'erreur
	echo $result;
}



include 'Template/footer.html.php';
?>