<?php

interface CustomerRepository{

public function setConnection(mysqli $connection);
public function saveCustomer($id,$name,$address,$contact,$nic);
public function updateCustomer($id,$name,$address,$contact,$nic);
public function deleteCustomer($id);
public function findCustomer($id);
public function findAllCustomers();


}