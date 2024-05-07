<?php
include 'Template/header.html.php';
?>
<div class="container mt-5">
    <h1>Nom de la salle : <?= $data->getName() ?></h1>
    <p>Type : <?= $data->getType() ?></p>
    <?php

    if (!empty($data->getShows())) : ?>
        <h2>Spectacles:</h2>
        <nav class="mb-8">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <br>
                    <?php $dates = [];
                    ?>

                </div>

                <?php foreach ($data->getShows() as $show) : ?>
                    <?php if (!in_array($show->getDate(), $dates)) : ?>
                        <?php $dates[] = $show->getDate(); ?>
                    <?php echo $show->getDate();
                    endif;
                    ?>
                    <br>
                    <div>
                        <?php
                        echo $show->getTime(); ?>
                        <br>
                        <?php echo $show->getLangage(); ?>
                    </div>
                    <?php $movies = [];

                    foreach ($data->getMovies() as $movie) : ?>
                        <?php if ($movie->getId() == $show->getMovie_id() && !in_array($movie->getId(), $movies)) : ?>
                            <div>
                                <?php $movies[] = $movie->getId();?>
                                <a href ="/movie/one/<?=$movie->getId()?>"><?=$movie->getName()?> </a>
                                <br>
                                <?php echo $movie->getDescription(); ?>
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