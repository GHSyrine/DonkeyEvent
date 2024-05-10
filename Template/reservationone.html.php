<?php
include 'Template/header.html.php';

?>

<h1>Détails de la réservation</h1>

<h2>séance</h2>
<?= $data->getSeance()[0]->getDate() ?>
<h2>place</h2>
<?php
foreach ($data->getseats() as $seat) : ?>
   <?= $seat->getNumber() ?>
<?php endforeach ?>
<h2>client</h2>
<?= $data->getCustomer() ?>
<h2>total</h2>
<?php $price = $data->getPrice();
$number = count($data->getSeat()); ?>
<h2>numéro de commande</h2>
<?= $data->getOrder(); ?>
<?php
include 'Template/footer.html.php';
?>