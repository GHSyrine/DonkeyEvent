<?php
include 'Template/header.html.php';
?>
    <h1><?=$data->getName()?></h1>
    <p><?=$data->getDescription()?></p>
    <h2>Catégories du film : </h2>
    <?php
    if(!empty($data->getCategories())) :
        foreach($data->getCategories() as $category) : ?>
            <span style="background:#d5acc7;"><b><?=$category->getName()?></b></span>
    <?php endforeach;
    endif; ?>
    
<h2>Séances du film : </h2>
<?php
    if(!empty($data->getSeances())) :
        foreach($data->getSeances() as $seance) : ?>
            <span style="background:#fcb2e8;padding:5px"><b><?=$seance->getPrice()?>€</b> - <b><?=$seance->getDate()?></b></span>
    <?php endforeach;
    endif; ?>
<?php
include 'Template/footer.html.php';
?>