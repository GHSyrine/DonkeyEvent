<?php
include 'Template/header.html.php';
?>
<div class="bg-dark">
    <h1 class="text-warning text-center">Récapitulatif de la réservation</h1>

    <h2 class="text-center text-white">Vous allez voir <b><?= $data->getMovies()[0]->getName() ?></b></h2>
    <h2 class="text-center  text-white">Le <b><?= $data->getDate() ?></b> à <b><?= $data->getTime() ?></b></h2>
    <h2 class="text-center  text-white" >Dans la salle <b><?= $data->getRoom()->getTitle() ?></b></h2>
    <h2 class="text-center  text-white">Place(s) : <b><?= implode(", ", $data->getSeats()); ?></b></h2>

    <form action="/customer/reserve/<?= $data->getId() ?>" method="POST">
        <input type="hidden" name="movieName" value="<?= $data->getMovies()[0]->getName() ?>">
        <input type="hidden" name="date" value="<?= $data->getDate() ?>">
        <input type="hidden" name="time" value="<?= $data->getTime() ?>">
        <input type="hidden" name="roomTitle" value="<?= $data->getRoom()->getTitle() ?>">
        <input type="hidden" name="seats" value="<?= implode(", ", $data->getSeats()); ?>">
        <input type="hidden" name="seanceId" value="<?= $data->getId() ?>">

        <div class="d-flex  col-1 mx-auto border-warning">
        <input class="bg-warning d-inline" type="submit" value="Confirmer la réservation">
        </div>
    </form>
</div>
<?php
            include 'Template/footer.html.php';

?>