<?php

require_once "Entity.php";

class Room extends Entity
{
    private string $title;
    private int $number_seat;
    private string $type;
    private int $cinema_id;
    private int $number_row;
    private array $movies = [];
    private array $seances = [];

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

    public function getNumber_row()
    {
        return $this->number_row;
    }

    public function setNumber_row($number_row)
    {
        $this->number_row = $number_row;

        return $this;
    }

    public function getSeances()
    {
        return $this->seances;
    }

    public function setSeances($seances)
    {
        $this->seances = $seances;

        return $this;
    }

    public function getMovies()
    {
        return $this->movies;
    }

    public function setMovies($movies)
    {
        $this->movies = $movies;

        return $this;
    }
}
