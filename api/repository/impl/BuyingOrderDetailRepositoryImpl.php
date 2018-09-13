<?php
/**
 * Created by IntelliJ IDEA.
 * User: THARAKA
 * Date: 7/29/2018
 * Time: 6:57 PM
 */

require_once __DIR__.'/../BuyingOrderDetailRepository.php';

class BuyingOrderDetailRepositoryImpl implements BuyingOrderDetailRepository{

    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection=$connection;
    }

    public function saveOrder($bcode, $ordid, $bprice)
    {
        $result=$this->connection->query("INSERT INTO buyingorderdetail VALUES('$bcode','$ordid','$bprice') ");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updateOrder($bcode, $ordid, $bprice)
    {
        $result = $this->connection->query("UPDATE buyingorderdetail SET bprice='{$bprice}' WHERE bcode='{$bcode}' and ordid='($ordid)'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function deleteOrder($bcode, $ordid)
    {
        $result = $this->connection->query("DELETE FROM buyingorderdetail WHERE bcode='{$bcode}' and ordid='($ordid)'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function findOrder($bcode, $ordid)
    {
        $resultset = $this->connection->query("SELECT * FROM buyingorderdetail WHERE bcode='{$bcode}' and ordid='($ordid)'");
        return $resultset->fetch_assoc();
    }

    public function findAllOrders()
    {
        $resultset = $this->connection->query("SELECT * FROM buyingorderdetail");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }
}