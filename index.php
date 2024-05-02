<?php
ini_set('display_errors', 1);

require_once 'Controller/MovieController.php';

// Movies list by category {id}
$movieController = new MovieController();
$movieController->view('movies', ['category' => 2]);





