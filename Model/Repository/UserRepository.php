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
       $query = "SELECT * FROM user WHRE email = : email";
       $statement =$this ->pdo->prepare($query);
       $statement->bindParam(":email", $email, PDO::PARAM_STR);
       $statement ->execute();
       $user = $statement ->fetch(PDO::FETCH_CLASS);
       return $user;
    }
}