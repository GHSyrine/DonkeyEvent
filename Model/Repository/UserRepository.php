<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/User.php";

class UserRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "user");
    }
}