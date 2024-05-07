<?php

require_once "Entity.php";

class Movie extends Entity {
    private string $name;
    private string $image = "";
    private string $description = "";
    private string $release_date = "";
    private array $categories = [];
    private array $seances = [];

    public function __construct() {
        $this->image = '/images/image.png';
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    public function getReleaseDate()
    {
        return $this->release_date;
    }

    public function setReleaseDate(string $release_date)
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

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
}