<?php

interface CustomerBO{

    public function getCustomersCount();

    public function getAllCustomers();

    public function deleteCustomer($id);

    public function saveCustomer($id,$name,$address,$contact,$nic);

    public function updateCustomer($id,$name,$address,$contact,$nic);

}