<?php

require_once "EntityRepository.php";

class CinemaRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        //
        parent::__construct($pdo, "cinema");
    }
}
