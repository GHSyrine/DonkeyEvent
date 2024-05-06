<?php 
include '../DonkeyEvent/Template/header.html.php';
?>
<h1>Liste des cinémas</h1>
<div class="container mt-5">
<h1 class="mb-4">Liste des Cinémas</h1>
<div class="row">
    <?php foreach ($data['cinemas'] as $cinema) : ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $cinema->getName() ?></h5>
                    <p class="card-text"><?= $cinema->getAddress() ?></p>
                    <a href="/cinema/one/<?= $cinema->getId() ?>" class="btn btn-primary">Voir les Détails</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<h1>Toutes les salles du cinéma</h1>
<?php foreach($data['rooms'] as $room) : ?>
        <li><a href="/cinema/one/<?=$room->getId()?>">
            <?=$room->getTitle()?>
            <?=$room->getNumber_seat()?>
            <?=$room->getType()?>
            <?=$room->getNumber_row()?>
        </a>
        </li>
<?php endforeach;
include '../DonkeyEvent/Template/footer.html.php';
?>
