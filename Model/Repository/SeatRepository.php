<?php

require_once "EntityRepository.php";

class SeatRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "seat");
    }
}