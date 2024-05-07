<?php
include 'Template/header.html.php';
?>

<div class="container mt-5">
    <h1 class="mb-4">Liste des Cinémas</h1>
    <div class="row">
        <?php foreach ($data as $cinema) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $cinema->getName() ?></h5>
                        <p class="card-text"><?= $cinema->getAddress() ?></p>
                        <a href="/cinema/one/<?= $cinema->getId() ?>" class="btn btn-primary">Voir les Détails</a>
                    </div>
                </div>
            </div>
        <?php endforeach;
        include 'Template/footer.html.php';
        ?>