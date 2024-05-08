<?php
include 'Template/header.html.php';
?>

<h1>Récapitulatif de la réservation</h1>

<h2>Vous allez voir <b><?= $data->getMovies()[0]->getName()?></b></h2>
<h2>Le <b><?= $data->getDate() ?></b> à <b><?= $data->getTime() ?></b></h2>
<h2>Dans la salle <b><?= $data->getRoom()->getTitle() ?></b></h2>
<h2>Place(s) : <b><?= implode(", ", $data->getSeats()); ?></b></h2>

<form action="/customer/reserve" method="POST">
    <input type="hidden" name="movieName" value="<?= $data->getMovies()[0]->getName()?>">
    <input type="hidden" name="date" value="<?= $data->getDate() ?>">
    <input type="hidden" name="time" value="<?= $data->getTime() ?>">
    <input type="hidden" name="roomTitle" value="<?= $data->getRoom()->getTitle() ?>">
    <input type="hidden" name="seats" value="<?= implode(", ", $data->getSeats()); ?>">
    <input type="submit" value="Confirmer la réservation">
</form>

<?php
include 'Template/footer.html.php';
?>