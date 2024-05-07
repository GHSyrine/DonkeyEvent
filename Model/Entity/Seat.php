<?php

require_once "Entity.php";

class Seat extends Entity {
    private string $number;
    private int $customer_id;
    private int $seance_id;

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber(string $number)
    {
        $this->number = $number;

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

    public function getSeance_id()
    {
        return $this->seance_id;
    }

    public function setSeance_id(int $seance_id)
    {
        $this->seance_id = $seance_id;

        return $this;
    }
}