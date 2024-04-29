<?php

require_once "Entity.php";

class Room extends Entity{
    private string $name;
    private int $number_seat;
    private string $type;
    private int $cinema_id;
    

    public function getName()
    {
        return $this->name;
    }

   
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    
    public function getNumber_seat()
    {
        return $this->number_seat;
    }

  
    public function setNumber_seat($number_seat)
    {
        $this->number_seat = $number_seat;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

   
    public function getCinema_id()
    {
        return $this->cinema_id;
    }

  
    public function setCinema_id($cinema_id)
    {
        $this->cinema_id = $cinema_id;

        return $this;
    }
}