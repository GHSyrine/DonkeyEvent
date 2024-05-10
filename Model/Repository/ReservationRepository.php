<?php
require_once "../DonkeyEvent/Model/Repository/EntityRepository.php";
require_once "../DonkeyEvent/Model/Entity/Reservation.php";

class ReservationRepository extends EntityRepository
{
    public function __Construct(PDO $pdo = null)
    {
        parent::__construct($pdo, "reservation");
    }

    public function getSeanceAndCustomerAndSeatsByReservationId($id)
    {
        require_once "../DonkeyEvent/Model/Entity/Seance.php";
        require_once "../DonkeyEvent/Model/Entity/Customer.php";
        require_once "../DonkeyEvent/Model/Entity/Seat.php";


        $tables = ["seance", "reservation"];
        $foreignkeys = ['seance.id = reservation.seance_id'];
        $seances = $this->getByFilterJoinTables($tables, $foreignkeys, "seance.*", "reservation.id=$id");
        $seance = $seances[0];

        $tables = ["customer", "reservation"];
        $foreignkeys = ['customer.id = reservation.customer_id'];
        $customers = $this->getByFilterJoinTables($tables, $foreignkeys, "customer.*", "reservation.id=$id");
        $customer = $customers[0];

        $reservation = $this->getById($id);
        $orderNum = $reservation->getOrderNum();

        $tables = ["seat", "reservation"];
        $foreignkeys = ['seat.id = reservation.seat_id'];
        $seats = $this->getByFilterJoinTables($tables, $foreignkeys, "seat.*", "reservation.orderNum=$orderNum");
        $infos = [$seance, $customer, $seats];
        return $infos;
    }

    public function getReservationByOrderNum($orderNum)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE orderNum = :orderNum");
        $statement->execute([":orderNum" => $orderNum]);
        $this->table = ucfirst($this->table);
        return $statement->fetchAll(PDO::FETCH_CLASS, $this->table);
    }

    public function getLastOrder()
    {
        $statement = $this->pdo->prepare("SELECT orderNum FROM $this->table ORDER BY orderNum desc limit 1");
        $statement->execute();
        $this->table = ucfirst($this->table);
        return $statement->fetch();
    }
}
