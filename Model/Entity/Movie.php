<?php

require_once "Entity.php";

class Movie extends Entity {
    private string $name;
    private string $description;
    private string $release_date;
    private array $categories = [];

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

    public function getRelease_date()
    {
        return $this->release_date;
    }

    public function setRelease_date(string $release_date)
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
}