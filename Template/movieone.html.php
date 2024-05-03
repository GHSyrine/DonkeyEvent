<?php
include 'Template/header.html.php';
?>
    <h1><?=$data->getName()?></h1>
    <p><?=$data->getDescription()?></p>
    Catégories du film : 
    <?php
    if(!empty($data->getCategories())) :
        foreach($data->getCategories() as $category) : ?>
            <span style="background:#d5acc7;"><b><?=$category->getName()?></b></span>
    <?php endforeach;
    endif; ?>
<?php
include 'Template/footer.html.php';
?>