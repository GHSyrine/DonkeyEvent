<?php

require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Room.php";

class RoomRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "room");
    }
}