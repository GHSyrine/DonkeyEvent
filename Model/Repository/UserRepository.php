<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/User.php";

class UserRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "user");
    }
    public function getUserbyEmail()
    {
       $query = "SELECT * FROM $this->table WHERE email = :email";
       $statement =$this ->pdo->prepare($query);
       $statement->bindParam(":email", $email, PDO::PARAM_STR);
       $statement ->execute();
       $this->table = ucfirst($this->table);
       $user = $statement->fetchAll(PDO::FETCH_CLASS, User::class);
       return $user;
    }
}