<?php
include 'Template/header.html.php';
setlocale(LC_TIME, "fr_FR");
$dates = [];
$movies = [];

$seances = $data->getSeances();
foreach ($seances as $seance) {
    if (!in_array($seance->getDate(), $dates)) {
        $date_formattee = date("D. j M", strtotime($seance->getDate()));
        $dates[] = $date_formattee;
    }

    foreach ($data->getMovies() as $movie) {
       if ($movie->getId() == $seance->getMovie_id()){
            $movies[$movie->getId()]['entity'] = $movie;
            $movies[$movie->getId()]['categories'] = $movie->getCategories();
            $movies[$movie->getId()]['seances'][] = $seance;
       }
    }
}
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
                    <?php $dates = []; ?>
                </div>
                <?php foreach ($data->getSeances() as $seance) : ?>
                    <?php if (!in_array($seance->getDate(), $dates)) : ?>
                        <?php $dates[] = $seance->getDate(); ?>
                    <?= $seance->getDate();
                    endif; ?>
                    <br>
                    <div>
                        <a href="/seance/one/<?= $seance->getId() ?>"> <?= $seance->getTime(); ?></a>
                        <br>
                        <?= $seance->getLangage(); ?>
                    </div>
                    <?php $movies = [];
                    foreach ($data->getMovies() as $movie) : ?>
                        <?php if ($movie->getId() == $seance->getMovie_id() && !in_array($movie->getId(), $movies)) : ?>
                            <div>
                                <?php $movies[] = $movie->getId(); ?>
                                <a href="/movie/one/<?= $movie->getId() ?>"><?= $movie->getName() ?> </a>
                                <br>
                        <?= "Release_date" . $movie->getReleaseDate();
                        //ajouter l'image
                        endif;
                    endforeach; ?>
                            </div>
                        <?php
                    endforeach;
                    foreach ($dates as $date) : ?>
                            <div>
                                <?= $date; ?>
                            </div>
                    <?php endforeach;
                endif; ?>