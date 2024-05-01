<?php

require_once "EntityRepository.php";

class CategoryRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "category");
    }

}

