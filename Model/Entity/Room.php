<?php

require_once "Entity.php";

class Room extends Entity{
    private string $title;
    private int $number_seat;
    private string $type;
    private int $number_row;
    private int $cinema_id;
    

    public function getTitle()
    {
        return $this->title;
    }

   
    public function setTitle($title)
    {
        $this->title = $title;

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
    // à voir 
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

    /**
     * Get the value of number_row
     */ 
    public function getNumber_row()
    {
        return $this->number_row;
    }

    /**
     * Set the value of number_row
     *
     * @return  self
     */ 
    public function setNumber_row($number_row)
    {
        $this->number_row = $number_row;

        return $this;
    }
}