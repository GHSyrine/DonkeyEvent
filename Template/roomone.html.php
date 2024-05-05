<?php
include 'Template/header.html.php';
?>
<div class="container mt-5">
<h1>Nom de la salle : <?=$data->getName()?></h1>
<p>Type : <?=$data->getType()?></p>


<?php if (!empty($data->getShows())) : ?>
        <h2>Spectacles:</h2>
        <nav class="mb-8">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($data->getShows() as $show) : ?>
                        <div class="swiper-slide">
                            <a href="/show/one/<?= $show->getId() ?>">
                                <?= $show->getDate() ?>
                    </a>
                            
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </nav>
        <?PHP endif;

 
