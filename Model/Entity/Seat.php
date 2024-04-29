<?php

require_once "Entity.php";

class Seat extends Entity {
    private string $number;
    private int $customer_id;
    private int $show_id;

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

    public function getShow_id()
    {
        return $this->show_id;
    }

    public function setShow_id(int $show_id)
    {
        $this->show_id = $show_id;

        return $this;
    }
}