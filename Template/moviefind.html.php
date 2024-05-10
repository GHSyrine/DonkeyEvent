<?php
include 'Template/header.html.php';
foreach ($data as $movie) : ?>
    <a href="/movie/one/<?= $movie->getId() ?>"><?= $movie->getName() ?> </a>
    <br>
<?php endforeach; ?>

<?php
include 'Template/footer.html.php';
?>