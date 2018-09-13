<?php
/**
 * Created by IntelliJ IDEA.
 * User: THARAKA
 * Date: 7/29/2018
 * Time: 5:18 PM
 */

interface BuyingOrderRepository{

    public function setConnection(mysqli $connection);
    public function saveOrder($cusid,$ordid,$orddate);
    public function updateOrder($cusid,$ordid,$orddate);
    public function deleteOrder($ordid);
    public function findOrder($ordid);
    public function findAllOrders();



}