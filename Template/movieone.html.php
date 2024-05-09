<?php
include 'Template/header.html.php';
?>
<body class="bg-dark">
    <section class="container-movie ">
        <h1 class="name text-white text-capitalize text-center"><?= $data->getName() ?></h1>
        <div class="text-center ">
            <img class="image-movie" src="<?= $data->getImage() ?>" alt="image du film">
        </div>

        <p class="description text-white text-capitalize text-center
        "><?= $data->getDescription() ?></p>
        <h2 class="text-white text-center">Catégories du film : </h2>
        <?php
        if (!empty($data->getCategories())) :
            foreach ($data->getCategories() as $category) : ?>
                <a href="/category/one/<?= $category->getId() ?>" style="color:white"><b><?= $category->getName() ?></b></a>
        <?php endforeach;
        endif; ?>

        <h2 class="text-white text-center ">Séances du film : </h2>
        
    <section class="cards seances">
    <?php
        if (!empty($data->getSeances())) :
            foreach ($data->getSeances() as $seance) : ?>
                <a href="/seance/one/<?= $seance->getId() ?>" style=" color:white;padding:5px"><b><?= $seance->getPrice() ?>€</b> - <b><?= $seance->getDate() ?></b></a>
        <?php endforeach;
        endif; ?>
       
    </section>
    <?php
        include 'Template/footer.html.php';
        ?>
    </section>
</body>