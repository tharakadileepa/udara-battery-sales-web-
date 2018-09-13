<?php

require_once __DIR__.'/../CustomerRepository.php';

class CustomerRepositoryImpl implements CustomerRepository {

    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection=$connection;
    }

    public function saveCustomer($id,$name,$address,$contact,$nic)
    {
        $result=$this->connection->query("INSERT INTO customer VALUES('$id','$name','$address','$contact','$nic') ");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updateCustomer($id,$name,$address,$contact,$nic)
    {
        $result = $this->connection->query("update customer set cusname='{$name}',cusaddress='{$address}',cuscontact='{$contact}',nicno='{$nic}' where cusid='{$id}'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function deleteCustomer($id)
    {
        $result = $this->connection->query("DELETE FROM customer WHERE cusid='{$id}'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function findCustomer($id)
    {
        $resultset = $this->connection->query("SELECT * FROM customer WHERE cusid='{$id}'");
        return $resultset->fetch_assoc();
    }

    public function findAllCustomers()
    {
        $resultset = $this->connection->query("SELECT * FROM customer");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }

}