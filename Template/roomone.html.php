

Nom de la salle : <?=$data->getName()?>
Type : <?=$data->getType()?>


<?php if (!empty($data->getShows())) : ?>
    <h2>Spectacles:</h2>
    <?php foreach ($data->getShows() as $show) : ?>
        <a href="/show/one/<?=$show->getId()?>">
            <?=$show->getDate()?>
        </a>
        <?php var_dump($show); ?>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (!empty($data->getMovies())) : ?>
    <h2>Films:</h2>
    <?php foreach ($data->getMovies() as $movie) : ?>
        <a href="/movie/one/<?=$movie->getId()?>">
            <?=$movie->getName()?>
        </a>
        <?php var_dump($movie); ?>
    <?php endforeach; ?>
<?php endif; 
