<?php

require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/CategoryRepository.php';

class CategoryController extends Controller {

    protected CategoryRepository $categoryRepository;

    public function __construct()
    {
        $categoryRepository = new CategoryRepository();
        parent::__construct($categoryRepository);
        $this->categoryRepository= $categoryRepository;
    }
    
}