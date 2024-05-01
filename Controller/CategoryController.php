<?php

require_once 'Controller.php';
require_once '../Model/Repository/CategoryRepository.php';

class CategoryController extends Controller {

    public function __construct()
    {
        $categoryRepository = new CategoryRepository();
        parent::__construct($categoryRepository);
    }
    
}