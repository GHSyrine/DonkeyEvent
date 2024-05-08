<?php
include 'Template/header.html.php';
?>

<h1><?=$data->getDate()?></h1>

<h2><?=$data->getPrice()?>€</h2>

<h2>
    <a href="/seat/one/1">Seat 1</a>
</h2>

<?php
include 'Template/footer.html.php';
?>