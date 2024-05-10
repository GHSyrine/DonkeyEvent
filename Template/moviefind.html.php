<?php
include 'Template/header.html.php';
echo "<pre>";
var_dump($data);
echo "</pre>";
foreach ($data as $movie) : ?>
    <a href="/movie/one/<?= $movie->getId() ?>"><?= $movie->getName() ?> </a>
    <br>
<?php endforeach; ?>

<?php
include 'Template/footer.html.php';
?>
