<h1>Tous les films</h1>
<ul>
<?php
foreach($data as $movie) {
    echo '<li><a href="/movie/one/'.$movie->getId().'">'.$movie->getName().'</a></li>';
}
?>
</ul>