<?php
include 'Template/header.html.php';
// Todo Move
setlocale(LC_TIME, "fr_FR");
$room = [];
$dates = [];
$movies = [];

$seances = $data->getSeances();
foreach ($seances as $seance) {
    if (!in_array($seance->getDate(), $dates)) {
        $date_formattee = date("D. j M", strtotime($seance->getDate()));
        $dates[] = $date_formattee;
    }

    foreach ($data->getMovies() as $movie) {
        if ($movie->getId() == $seance->getMovie_id()) {
            $movies[$movie->getId()]['entity'] = $movie;
            $movies[$movie->getId()]['categories'] = $movie->getCategories();
            $movies[$movie->getId()]['seances'][] = $seance;
        }
    }
}
?>

<body class="container-body bg-dark">
    <div class="container mt-5">
        <h1 class="salle text-center text-white text-capitalize"> <?= $data->getTitle() ?></h1>
        <h2 class="d-inline type-seance text-capitalize text-white border-left border-right border-4 p-2 border-warning"><?= $data->getType() ?></h2>
        <div class="d-flex justify-content-center text-center">
            <?php
            foreach ($dates as $date) :
                $dateSplit = explode(" ", $date);
            ?>
                <div class="p-3 m-2 text-white border-bottom border-warning">
                    <div><?= $dateSplit[0]; ?></div>
                    <div><?= $dateSplit[1]; ?></div>
                    <div><?= $dateSplit[2]; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
        if (!empty($seances)) : ?>
            <h2 class="title-seance text-capitalize text-white ">Séances:</h2>
            <?php foreach ($movies as $movie) :
            ?>
                <div class="d-flex justify-content-between swiper-container text-white mt-5">
                    <img src="<?= $movie['entity']->getImage() ?>">
                    <div class="">
                        <a class="title-movie text-capitalize text-white" href="/movie/one/<?= $movie['entity']->getId() ?>"><?= $movie['entity']->getName() ?>
                        </a>
                        <?php
                        foreach ($movie['categories'] as $category) : ?>
                            <span class="p-1 bg-warning"><?= $category ?></span>
                        <?php endforeach; ?>
                        <p class="exit text-capitalize"> date de sortie : <?= $movie['entity']->getReleaseDate() ?></p>
                    </div>
                    <div class="">
                        <?php
                        foreach ($movie['seances'] as $seance) : ?>
                            <div class="p-1 border">
                                <div><?= $seance->getTime() ?></div>
                                <div><?= $seance->getLangage() ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
        <?php endforeach;
        endif;
        include 'Template/footer.html.php';
        ?>
    </div>
</body>