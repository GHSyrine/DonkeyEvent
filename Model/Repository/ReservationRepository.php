<?php
require_once "EntityRepository.php";
Class ReservationRepository extends EntityRepository
{
    public function __Construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "reservation");
    }
}