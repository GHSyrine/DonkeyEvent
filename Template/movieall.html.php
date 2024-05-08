<?php
include 'Template/header.html.php';
// @todo
if (isset($_SESSION['log'])) { ?>
    <div class="alert alert-sucess">
    <?php echo $_SESSION['log'];
    unset($_SESSION['log']);
}
    ?>

    <h1>Tous les films</h1>
    <ul>
        <?php
        $categories = [];
        foreach ($data as $movie) : ?>
            <li><a href="/movie/one/<?= $movie->getId() ?>">
                    <?= $movie->getName() ?></a>
                <?php
                if (!empty($movie->getCategories())) :
                    foreach ($movie->getCategories() as $category) : ?>
                        <span style="background:#d5acc7;"><b><?= $category->getName() ?></b></span>
                <?php endforeach;
                endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Voir Toutes les catégories disponibles :</h2>
    <ul>
        <?php
        foreach ($data as $movie) :
            foreach ($movie->getCategories() as $category) {

                if (in_array($category, $categories)) {
                } else {
                    $categories[] = $category;
                }
            }
        ?>
        <?php endforeach; ?>

        <?php foreach ($categories as $category) : ?>
            <li><a href="/category/one/<?= $category->getId() ?>">
                    <?= $category->getName() ?></a>
            </li>
        <?php endforeach; ?>

    </ul>
    <?php
    include 'Template/footer.html.php';
    ?>