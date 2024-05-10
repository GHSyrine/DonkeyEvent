<?php
foreach ($data as $movie) : ?>
    <a href="/movie/one/<?= $movie->getId() ?>"><?= $movie->getName() ?> </a>
    <br>
<?php endforeach;
