<?php

require_once "Entity.php";

class Reservation extends Entity {
    private string $order;
    private int $show_id;
    private int $seat_id;
    private int $customer_id;

    public function getOrder()
    {
        return $this->order;
    }

    public function setOrder(string $order)
    {
        $this->order = $order;

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
}