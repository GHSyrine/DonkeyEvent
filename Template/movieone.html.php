<?php
include 'Template/header.html.php';
?>

<body class="bg-dark">
    <section class="container-movie ">
        <h1 class="name text-white text-capitalize text-center"><?= $data->getName() ?></h1>
        <br>
        <div class="d-flex text-center">
            <img class="image-movie" src="<?= $data->getImage() ?>" alt="image du film">
            <div>
                <h3 class="description text-white text-capitalize text-center pl-2"><?= $data->getDescription() ?>
                </h3>
                <br>
                <h5 class="text-white text-center text-warning">Catégories du film : </h5>
                <?php
                if (!empty($data->getCategories())) :
                    foreach ($data->getCategories() as $category) : ?>
                        <a href="/category/one/<?= $category->getId() ?>" style="color:white"><b><?= $category->getName() ?></b></a>
                <?php endforeach;
                endif; ?>
                <h5 class="text-white text-center text-warning mt-5">Séances du film : </h5>
                <section class="cards seances">
                    <?php
                    if (!empty($data->getSeances())) :
                        foreach ($data->getSeances() as $seance) : ?>
                            <a href="/seance/one/<?= $seance->getId() ?>" class="p-1 text-white"><b><?= $seance->getPrice() ?>€</b> - <b><?= $seance->getDate() ?></b></a>
                    <?php endforeach;
                    endif; ?>

                </section>
            </div>
        </div>

        <?php
        include 'Template/footer.html.php';
        ?>
    </section>
</body>