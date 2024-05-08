<?php
include 'Template/header.html.php';
?>
    <h1><?=$data->getName()?></h1>
    <p><?=$data->getDescription()?></p>
    <h2>Catégories du film : </h2>
    <?php
    if(!empty($data->getCategories())) :
        foreach($data->getCategories() as $category) : ?>
            <a href="/category/one/<?=$category->getId()?>"style="background:#d5acc7;"><b><?=$category->getName()?></b></a>
    <?php endforeach;
    endif; ?>
    
<h2>Séances du film : </h2>
<?php
    if(!empty($data->getSeances())) :
        foreach($data->getSeances() as $seance) : ?>
            <a href="/seance/one/<?=$seance->getId()?>" style="background:#fcb2e8;padding:5px"><b><?=$seance->getPrice()?>€</b> - <b><?=$seance->getDate()?></b></a>
    <?php endforeach;
    endif; ?>
<?php
include 'Template/footer.html.php';
?>