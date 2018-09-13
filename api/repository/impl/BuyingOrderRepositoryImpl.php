<?php
/**
 * Created by IntelliJ IDEA.
 * User: THARAKA
 * Date: 7/29/2018
 * Time: 6:57 PM
 */

require_once __DIR__.'/../BuyingOrderRepository.php';

class BuyingOrderRepositoryImpl implements BuyingOrderRepository {

    private $connection;


    public function setConnection(mysqli $connection)
    {
        $this->connection=$connection;
    }

    public function saveOrder($cusid, $ordid, $orddate)
    {
        $result=$this->connection->query("INSERT INTO buyingorder VALUES('$cusid','$ordid','$orddate') ");
        $this->connection->insert_id;
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updateOrder($cusid, $ordid, $orddate)
    {
        $result = $this->connection->query("UPDATE buyingorder SET cusid='{$cusid}', orddate='{$orddate}' WHERE ordid='{$ordid}'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function deleteOrder($ordid)
    {
        $result = $this->connection->query("DELETE FROM buyingorder WHERE ordid='{$ordid}'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function findOrder($ordid)
    {
        $resultset = $this->connection->query("SELECT * FROM buyingorder WHERE ordid='{$ordid}'");
        return $resultset->fetch_assoc();
    }

    public function findAllOrders()
    {
        $resultset = $this->connection->query("SELECT * FROM buyingorder");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }


}