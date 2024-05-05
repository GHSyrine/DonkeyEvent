<?php 
include 'Template/header.html.php';
?>
<h1>Liste des cinémas</h1>
<?php
foreach ($data['cinemas'] as $cinema) :?>
  <ul>
    <a href="/cinema/one/<?=$cinema->getId()?>">
    <?=$cinema->getName()?>
    </a>
  </ul>  
    <?php
  endforeach;
include 'Template/footer.html.php';
?>