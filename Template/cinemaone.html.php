<?php 
include '../DonkeyEvent/Template/header.html.php';
?>
<h1><?=$data['cinema']->getName()?></h1>
<p>
   <span>L'adresse du cinema: <?=$data['cinema']->getAddress()??""?></span> 
   <span>Liste des salles </span>
   <?php
   foreach ($data['rooms'] as $room) {?>
    <?=$room?>
    <?php
   }
   ?>
</p>
<?php
include '../DonkeyEvent/Template/footer.html.php'
?>
