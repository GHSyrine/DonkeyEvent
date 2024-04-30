<?php

require_once "Entity.php";

class User extends Entity{
    private string $email;
    private int $password;
    private int $customer_id;


    public function getEmail()
    {
        return $this->email;
    }

   
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

  
    public function getCustomer_id()
    {
        return $this->customer_id;
    }

   
    public function setCustomer_id($customer_id)
    {
        $this->customer_id = $customer_id;

        return $this;
    }
}
    
