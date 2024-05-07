<?php
include 'Template/header.html.php';
var_dump($_SESSION);
// @todo
if (isset($_SESSION['log'])) {?>
    <div class="alert alert-sucess">
   <?php  echo $_SESSION['log'];
    unset($_SESSION['log']);
}
?>
<h1>Tous les films</h1>
    <ul>
    <?php foreach($data as $movie) : ?>
        <li><a href="/movie/one/<?=$movie->getId()?>">
            <?=$movie->getName()?></a>
        </li>
    <?php endforeach ?>
    </ul>
<?php
include 'Template/footer.html.php';
?>