<?php
require_once "Entity.php";

class Seance extends Entity{
    private string $date;
    private string $time;
    private int $price; 
    private string $langage;
    private int $movie_id;
    private int $room_id;
    private object $room;
    private array $seats = [];
    private array $movies = [];

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function getLangage()
    {
        return $this->langage;
    }

    public function setLangage($langage)
    {
        $this->langage = $langage;

        return $this;
    }

    public function getMovie_id()
    {
        return $this->movie_id;
    }

    public function setMovie_id($movie_id)
    {
        $this->movie_id = $movie_id;

        return $this;
    }

    public function getRoom_id()
    {
        return $this->room_id;
    }

    public function setRoom_id($room_id)
    {
        $this->room_id = $room_id;

        return $this;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;

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

    public function getRoom()
    {
        return $this->room;
    }

    public function setRoom($room) : void
    {
        $this->room = $room;
    }

    public function getSeats()
    {
        return $this->seats;
    }

    public function setSeats($seats) : void
    {
        $this->seats = $seats;
    }
}
