<?php

require_once "Entity.php";

class Cinema extends Entity{
    private string $name;
    private string $address;
    private array $rooms =[];

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress(string $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of rooms
     */ 
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set the value of rooms
     *
     * @return  self
     */ 
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;

        return $this;
    }
}