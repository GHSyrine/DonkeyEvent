<?php
include 'Template/header.html.php';

?>

<h1>Détails de la réservation</h1>

<?php foreach ($data as $reservation) : ?>

<h2>séance</h2>
<?= $reservation->getSeance()->getDate() ?>
<h2>client</h2>
<?= $reservation->getCustomer()->getFirstname() . " " . $reservation->getCustomer()->getLastname() ?>
<h2>place</h2>
<?php
$price = $reservation->getSeance()->getPrice();
foreach ($reservation->getSeats() as $seat) {
   echo $seat->getNumber();
   $seats[] = $seat->getNumber();
}

$total = count($seats) * $price;
?>
<h2>total</h2>
<?php 

echo $total . "€"; 
?>
<h2>numéro de commande</h2>
<?= $reservation->getOrderNum(); 
$orderNumber = $reservation->getOrderNum();
break;
?>
<?php endforeach;

$name = "/images/qrcode/qr-code-".$orderNumber.".png";
?>
<br>
<br>
<br>
<img src=<?=$name?> alt='qr-code'>

<?php
include 'Template/footer.html.php';
?>