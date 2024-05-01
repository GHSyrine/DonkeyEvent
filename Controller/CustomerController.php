<?php
require_once 'Controller.php';
require_once '../Model/Repository/CustomerRepository.php';

Class CustomerRepository extends Controller{
    public function __construct()
    {
        $customerRepository = new CustomerRepository();
        parent::__construct($customerRepository);

    }

}