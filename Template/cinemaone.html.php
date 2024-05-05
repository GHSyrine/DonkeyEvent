<?php 
include 'Template/header.html.php';
 ?>

<h1>Salles de cinéma pour <?= $data->getName(); ?>-<?= $data->getAddress(); ?> </h1>

<?php 

  if(!empty($data->getRooms())) :
    foreach($data->getRooms() as $room) : ?>
    <a href="/room/one/<?=$room->getId()?>">
    <?=$room->getName()?>
    </a>
      <?=$room->getNumber_Seat()?>
    
   <?php   var_dump($room);
endforeach;
endif;
   
include 'Template/footer.html.php'; ?>
