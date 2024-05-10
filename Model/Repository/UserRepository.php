
<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/User.php";

class UserRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "user");
    }
    public function getUserByEmail($email)
    {
       $query = "SELECT * FROM user WHERE email = :email";
       $statement =$this ->pdo->prepare($query);
       $statement->bindParam(":email", $email, PDO::PARAM_STR);
       $statement ->execute();
       $this->table = ucfirst($this->table);
       
       return $user = $statement->fetchAll(PDO::FETCH_CLASS, $this->table)[0];
       
    }
}