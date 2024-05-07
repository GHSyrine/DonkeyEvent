<?php
include 'Template/header.html.php';
?>
<h1>Tous les films</h1>
    <ul>
    <?php foreach($data as $movie) : ?>
        <li><a href="/movie/one/<?=$movie->getId()?>">
            <?=$movie->getName()?></a>
            <?php
            if(!empty($movie->getCategories())) :
                foreach($movie->getCategories() as $category) : ?>
                    <span style="background:#d5acc7;"><b><?=$category->getName()?></b></span>
            <?php endforeach;
            endif; ?>
        </li>
    <?php endforeach; ?>
    </ul>

    <h2>Voir Toutes les catégories disponibles :</h2>
    <ul>
    <?php foreach($data->getCategories() as $category) : ?>
        <li><?=$category->getName()?></li>
    <?php endforeach;?>
    
    </ul>
<?php
include 'Template/footer.html.php';
?>