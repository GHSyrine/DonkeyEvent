<?php
require_once "../Model/Repository/CategoryRepository.php";

$categoryRepository = new CategoryRepository();
$movies = $categoryRepository->getMoviesByCategoryId(1);
foreach($movies as $movie){
    echo "Titre:" . $movie->getName();
    echo "<br />";
}

