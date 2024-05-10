<?php
require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Customer.php";

Class CustomerRepository extends EntityRepository
{
    public function __Construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "customer");
    }
    public function getLastCustomerId()
    {
        $statement = $this->pdo->prepare("SELECT id FROM $this->table ORDER BY id desc limit 1");
        $statement->execute();
        $this->table = ucfirst($this->table);
        return $statement->fetch();
    }
}