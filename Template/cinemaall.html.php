<?php 
include '..DonkeyEvent/Template/header.html.php';
?>
<h1>Liste des cinémas</h1>
<?php
foreach ($data as $cinema) :?>

    <a href="/cinema/one/<?=$cinema->getId()?>">
    <?=$cinema->getName()?>
    </a>


<?php endforeach;?>
<?php
include '..DonkeyEvent/Template/footer.html.php'
?>
