<?php
require_once "EntityRepository.php";
Class CustomerRepository extends EntityRepository
{
    public function __Construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "customer");
    }
}