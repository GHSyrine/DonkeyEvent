<?php 
include '..DonkeyEvent/Template/header.html.php';
?>
<h1><?=$data->getName()?></h1>
<p>
   <span>  L'adresse du cinema: <?=$data->getAddress()??""?></span> 
   <span>Liste des salles </span>
   <?php
   foreach ($data as $rooms) {?>
    <?$data['name']?>
    <?php
   }
   ?>
</p>
<?php
include '..DonkeyEvent/Template/footer.html.php'
?>
