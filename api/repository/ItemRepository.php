<?php
/**
 * Created by IntelliJ IDEA.
 * User: THARAKA
 * Date: 7/28/2018
 * Time: 11:03 AM
 */

interface ItemRepository{

    public function setConnection(mysqli $connection);
    public function saveItem($bcode,$btype,$bcategory);
    public function updateItem($bcode,$btype,$bcategory);
    public function deleteItem($bcode);
    public function findItem($bcode);
    public function findAllItems();

}