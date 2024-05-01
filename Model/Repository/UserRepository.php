<?php

require_once "EntityRepository.php";

class UserRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "user");
    }
}