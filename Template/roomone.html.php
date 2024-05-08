<?php
include 'Template/header.html.php';
?>
<div class="container mt-5">
    <h1>Nom de la salle : <?= $data->getTitle() ?></h1>
    <p>Type : <?= $data->getType() ?></p>
    <?php

    if (!empty($data->getSeances())) : ?>
        <h2>Spectacles:</h2>
        <nav class="mb-8">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <br>
                    <?php $dates = [];
                    ?>

                </div>

                <?php foreach ($data->getSeances() as $seance) : ?>
                    <?php if (!in_array($seance->getDate(), $dates)) : ?>
                        <?php $dates[] = $seance->getDate(); ?>
                    <?php echo $seance->getDate();
                    endif;
                    ?>
                    <br>
                    <div>
                        <?php
                        echo $seance->getTime(); ?>
                        <br>
                        <?php echo $seance->getLangage(); ?>
                    </div>
                    <?php $movies = [];

                    foreach ($data->getMovies() as $movie) : ?>
                        <?php if ($movie->getId() == $seance->getMovie_id() && !in_array($movie->getId(), $movies)) : ?>
                            <div>
                                <?php $movies[] = $movie->getId();?>
                                <a href ="/movie/one/<?=$movie->getId()?>"><?=$movie->getName()?> </a>
                                <br>
                                
                        <?php echo "Release_date" . $movie->getReleaseDate();
                        //ajouter l'image
                        endif;
                    endforeach; ?>
                            </div>
                        <?php
                    endforeach;
                    foreach ($dates as $date) : ?>
                            <div>
                                <?php echo $date; ?>
                            </div>
                    <?php endforeach;
                endif; ?>