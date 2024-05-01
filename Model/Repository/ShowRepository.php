<?php

require_once "EntityRepository.php";

class ShowRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        //
        parent::__construct($pdo, "show");
    }
}
