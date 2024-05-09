<?php
require_once  "Entity.php";
Class Customer extends Entity {
    private string $firstname;
    private string $lastname; 
    private string $email; 
    
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }
 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }
 
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}