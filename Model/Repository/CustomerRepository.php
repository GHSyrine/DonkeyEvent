<?php
require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Customer.php";

Class CustomerRepository extends EntityRepository
{
    public function __Construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "customer");
    }
}