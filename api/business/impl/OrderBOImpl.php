<?php
/**
 * Created by IntelliJ IDEA.
 * User: THARAKA
 * Date: 7/29/2018
 * Time: 10:47 PM
 */

require_once __DIR__ . '/../OrderBO.php';
require_once __DIR__ . '/../../repository/impl/BuyingOrderRepositoryImpl.php';
require_once __DIR__ . '/../../repository/impl/BuyingOrderDetailRepositoryImpl.php';
require_once __DIR__ . '/../../db/DBConnection.php';

class OrderBOImpl implements OrderBO{

    private $buyingOrderRepository;
    private $buyingOrderDetailRepository;

    public function __construct()
    {
        $this->buyingOrderRepository=new BuyingOrderRepositoryImpl();
        $this->buyingOrderDetailRepository=new BuyingOrderDetailRepositoryImpl();
    }

    public function getItemsCount()
    {
        $connection=(new DBconnection())->getConnection();
        $this->buyingOrderRepository->setConnection($connection);

        $count = count($this->buyingOrderRepository->findAllOrders());
        mysqli_close($connection);
        return $count;
    }


    public function deleteItem($ordid)
    {
        $connection = (new DBConnection())->getConnection();
        $this->buyingOrderRepository->setConnection($connection);

        $result = $this->buyingOrderRepository->deleteOrder($ordid);

        mysqli_close($connection);

        return $result;
    }

    public function saveItem($cusid, $ordid, $orddate,$bcode,$bprice)
    {
        $connection = (new DBConnection())->getConnection();
        $connection->autocommit(false);
        $this->buyingOrderDetailRepository->setConnection($connection);
        $this->buyingOrderRepository->setConnection($connection);



        $result = $this->buyingOrderRepository->saveOrder($cusid,$ordid,$orddate);
        if($result){
            $result1=$this->buyingOrderDetailRepository->saveOrder($bcode,$ordid,$bprice);
            if($result1){
                $connection->commit(true);
                $connection->autocommit(true);
                return $result1;
            }
            else{
                $connection->rollback();
                $connection->autocommit(true);
            }
        }
        else{
        $connection->rollback();
        }

        mysqli_close($connection);

        return $result;
    }


}