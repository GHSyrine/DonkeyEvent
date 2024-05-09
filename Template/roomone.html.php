<?php
include 'Template/header.html.php';
?>
<body class="container-body bg-dark">
    <div class="container mt-5">
        <h1 class="salle text-center text-white text-capitalize"> <?= $data->getTitle() ?></h1>
        <p class="type-seance text-capitalize text-white">Type : <?= $data->getType() ?></p>
        <?php
    if (!empty($data->getSeances())) : ?>
        <h2 class="title-seance text-capitalize text-white ">Séances:</h2>
        <nav class=" card mb-8 bg-dark">
            <div class="swiper-container text-white">
            <?php $dates = [];?>

                <?php foreach ($data->getSeances() as $seance) : ?>
                    <?php if (!in_array($seance->getDate(), $dates)) : ?>
                        <?php $dates[] = $seance->getDate(); ?>
                    <?= $seance->getDate();
                    endif; ?>
                    <br>
                    <div><?= $seance->getTime(); ?><br><?= $seance->getLangage();?></a></div>
            
                    
                    <?php $movies = [];
                    foreach ($data->getMovies() as $movie) : ?>
                        <?php if ($movie->getId() == $seance->getMovie_id() && !in_array($movie->getId(), $movies)) : ?>
                                <?php $movies[] = $movie->getId(); ?>
                                <a class="title-movie text-capitalize text-white" href="/movie/one/<?= $movie->getId() ?>"><?= $movie->getName()?></a>
                                <p class="exit text-capitalize"> date de sortie : <?= $movie->getReleaseDate()?></p>
                                <br>
                                
                                <img src="<?=$movie->getImage()?>">
                       <?php endif;
                    endforeach; ?>
                        <?php
                    endforeach;
                    foreach ($dates as $date) : ?>
                            <div>
                                <?= $date; ?>
                            </div>
                    <?php endforeach;
                    
                endif;
            include 'Template/footer.html.php';
            ?>
    </div>
</body>