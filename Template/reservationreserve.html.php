<?php
include 'Template/header.html.php';
?>

<h1>Réservation</h1>
<h2>Vous allez recevoir un email qui récapitule votre réservation à l'adresse que vous avez renseignée.</h2>

<a href="/reservation/one/<?= $data ?>">Afficher le reçu de la réservation</a>

<?php
// qr code
/*
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
$qrCode = QrCode::create("Votre numéro de commande est le : ".$data." Merci de le conserver ainsi que l'email pour retirer vos places. Rendez vous à cette addresse pour voir le résumer de votre réservation : http://localhost/reservation/one/".$data.".")
    ->setEncoding(new Encoding('UTF-8'))
    ->setErrorCorrectionLevel(ErrorCorrectionLevel::High)
    ->setSize(300)
    ->setMargin(10)
    ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
    ->setForegroundColor(new Color(0, 0, 0))
    ->setBackgroundColor(new Color(255, 255, 255));

$result = $writer->write($qrCode, null, null);

// Save it to a file
$result->saveToFile("../DonkeyEvent/images/qrcode/qr-code-".$data.".png");

// Generate a data URI to include image data inline (i.e. inside an <img> tag)
$dataUri = $result->getDataUri();
$name = "/images/qrcode/qr-code-".$data.".png";
?>
<img src=<?=$name?> alt='qr-code'>

<?php*/
include 'Template/footer.html.php';
?>