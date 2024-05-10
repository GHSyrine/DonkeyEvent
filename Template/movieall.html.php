<?php
include 'Template/header.html.php';

if (isset($_SESSION['log'])) { ?>
    <div class="alert alert-sucess">
    <?php echo $_SESSION['log'];
    unset($_SESSION['log']);
}
    ?>
    <div class="bg-dark">
        <h1 class="text-white text-capitalize">Tous les films</h1>
        <ul>
            <?php
            $categories = [];
            foreach ($data as $movie) : ?>
                <div class=" text-white">
                    <a class="text-warning" href="/movie/one/<?= $movie->getId() ?>">
                        <?= $movie->getName() ?></a>
                    <?php
                    if (!empty($movie->getCategories())) :
                        foreach ($movie->getCategories() as $category) : ?>
                            <span class="text-white"> - <?= $category->getName() ?></b></span>
                    <?php endforeach;
                    endif; ?>
                </div>
            <?php endforeach; ?>
        </ul>

        <h2 class="text-white">Voir Toutes les catégories disponibles :</h2>
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
                <div class="text-white"><a class="text-warning" href="/category/one/<?= $category->getId() ?>">
                        <?= $category->getName() ?></a>
                </div>
            <?php endforeach; ?>
    </div>
    </ul>
    <script>
    $(function() {
        const availableTags = [
            <?php foreach ($data as $movie) : ?> "<?= $movie->getName() ?>",
            <?php endforeach; ?>
        ];
        $("#autoComplete").autocomplete({
            source: availableTags
        });
    });
</script>
    <?php
    include 'Template/footer.html.php';
    ?>