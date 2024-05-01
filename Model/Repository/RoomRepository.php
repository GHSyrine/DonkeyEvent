<?php

require_once "EntityRepository.php";

class RoomRepository extends EntityRepository
{
    public function __construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "room");
    }
}