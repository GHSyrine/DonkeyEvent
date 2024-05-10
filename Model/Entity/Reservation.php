<?php

require_once "Entity.php";

class Reservation extends Entity {
    private string $orderNum;
    private int $seance_id;
    private int $seat_id;
    private int $customer_id;
    private array $customer; 
    private array $seance; 
    private array $seats;

    public function getSeance_id()
    {
        return $this->seance_id;
    }

    public function setSeance_id(int $seance_id)
    {
        $this->seance_id = $seance_id;

        return $this;
    }

    public function getSeat_id()
    {
        return $this->seat_id;
    }

    public function setSeat_id(int $seat_id)
    {
        $this->seat_id = $seat_id;

        return $this;
    }

    public function getCustomer_id()
    {
        return $this->customer_id;
    }

    public function setCustomer_id(int $customer_id)
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    public function getSeats()
    {
        return $this->seats;
    }

    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }

    public function getSeance()
    {
        return $this->seance;
    }

    public function setSeance($seance)
    {
        $this->seance = $seance;

        return $this;
    }
   
    public function getCustomer()
    {
        return $this->customer;
    }
 
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    public function getOrderNum()
    {
        return $this->orderNum;
    }
    
    public function setOrderNum($orderNum)
    {
        $this->orderNum = $orderNum;

        return $this;
    }
}