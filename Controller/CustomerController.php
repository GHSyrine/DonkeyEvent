<?php
require_once 'Controller.php';
require_once '../DonkeyEvent/Model/Repository/CustomerRepository.php';

Class CustomerRepository extends Controller{

    protected CustomerRepository $customerRepository;

    public function __construct()
    {
        $customerRepository = new CustomerRepository();
        parent::__construct($customerRepository);
        $this->customerRepository = $customerRepository;
    }

}