<?php

require_once "EntityRepository.php";

class MovieRepositoryRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        //
        parent::__construct($pdo, "movie");
    }
}
