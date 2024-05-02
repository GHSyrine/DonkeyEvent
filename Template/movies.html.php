Liste des films
<?php
// @Todo $movie->getId() ne retourne pas l'id
foreach($data as $movie){ 
?>
    <div>
        <a href="movie-detail?id=<?=$movie->getId()?>"><?=$movie->getName()?></a>
    </div>
<?php
}
?>

