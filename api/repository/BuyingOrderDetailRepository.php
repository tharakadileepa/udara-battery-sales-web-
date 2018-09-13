<?php
/**
 * Created by IntelliJ IDEA.
 * User: THARAKA
 * Date: 7/29/2018
 * Time: 5:19 PM
 */
interface BuyingOrderDetailRepository{

    public function setConnection(mysqli $connection);
    public function saveOrder($bcode,$ordid,$bprice);
    public function updateOrder($bcode,$ordid,$bprice);
    public function deleteOrder($bcode,$ordid);
    public function findOrder($bcode,$ordid);
    public function findAllOrders();

}