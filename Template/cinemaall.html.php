<?php
include 'Template/header.html.php';
?>

<body class="container-body bg-dark">
    <div class="container mt-5">
        <h1 class="mb-4 text-white text-center">Liste des Cinémas</h1>
        <div class="col">
            <?php foreach ($data as $cinema) : ?>
                <div class="col-list">
                    <div class="list-cinema">
                        <div class="text-cinema card-body bg-dark border-bottom">
                            <h5 class="card-title text-warning text-capitalize"><?= $cinema->getName() ?></h5>
                            <p class="card-text text-white"><?= $cinema->getAddress() ?></p>
                            <a href="/cinema/one/<?= $cinema->getId() ?>" class="btn btn-outline-warning">Voir les Détails</a>
                        </div>
                    </div>
                </div>
</body>
<?php endforeach;
            include 'Template/footer.html.php';
?>