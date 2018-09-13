<?php

require_once __DIR__.'/../ItemRepository.php';

class ItemRepositoryImpl implements ItemRepository {

    private $connection;

    public function setConnection(mysqli $connection)
    {
        $this->connection=$connection;
    }

    public function saveItem($bcode, $btype, $bcategory)
    {
        $result=$this->connection->query("INSERT INTO battery VALUES('$bcode','$btype','$bcategory')");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function updateItem($bcode, $btype, $bcategory)
    {
        $result = $this->connection->query("UPDATE battery SET btype='($btype)',bcategory='($bcategory)' where bcode='($bcode)'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function deleteItem($bcode)
    {
        $result = $this->connection->query("DELETE FROM battery WHERE bcode='{$bcode}'");
        return ($result && ($this->connection->affected_rows > 0));
    }

    public function findItem($bcode)
    {
        $resultset = $this->connection->query("SELECT * FROM battery WHERE bcode='{$bcode}'");
        return $resultset->fetch_assoc();
    }

    public function findAllItems()
    {
        $resultset = $this->connection->query("SELECT * FROM battery");
        return $resultset->fetch_all(MYSQLI_ASSOC);
    }
}