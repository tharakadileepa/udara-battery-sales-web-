<?php


require_once __DIR__ . '/../ItemBO.php';
require_once __DIR__ . '/../../repository/impl/ItemRepositoryImpl.php';
require_once __DIR__ . '/../../db/DBConnection.php';

class ItemBOImpl implements ItemBO {

    private $ItemRepository;

    public function __construct()
    {
        $this->ItemRepository=new ItemRepositoryImpl();
    }

    public function getItemsCount()
    {
        $connection=(new DBconnection())->getConnection();
        $this->ItemRepository->setConnection($connection);

        $count = count($this->ItemRepository->findAllItems());
        mysqli_close($connection);
        return $count;
    }

    public function getAllItems()
    {
        $connection=(new DBconnection())->getConnection();
        $this->ItemRepository->setConnection($connection);

        $items=$this->ItemRepository->findAllItems();
        mysqli_close($connection);

        return $items;
    }

    public function deleteItem($bcode)
    {
        $connection = (new DBConnection())->getConnection();
        $this->ItemRepository->setConnection($connection);

        $result = $this->ItemRepository->deleteItem($bcode);

        mysqli_close($connection);

        return $result;
    }

    public function saveItem($bcode, $btype, $bcategory)
    {
        $connection = (new DBConnection())->getConnection();
        $this->ItemRepository->setConnection($connection);

        $result = $this->ItemRepository->saveItem($bcode,$btype,$bcategory);

        mysqli_close($connection);

        return $result;
    }

    public function updateItem($bcode, $btype, $bcategory)
    {
        $connection = (new DBConnection())->getConnection();
        $this->ItemRepository->setConnection($connection);

        $result = $this->ItemRepository->updateItem($bcode,$btype,$bcategory);

        mysqli_close($connection);

        return $result;
    }
}