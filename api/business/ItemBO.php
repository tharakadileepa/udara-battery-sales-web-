<?php
/**
 * Created by IntelliJ IDEA.
 * User: THARAKA
 * Date: 7/28/2018
 * Time: 11:34 AM
 */
interface ItemBO{

    public function getItemsCount();

    public function getAllItems();

    public function deleteItem($bcode);

    public function saveItem($bcode,$btype,$bcategory);

    public function updateItem($bcode,$btype,$bcategory);

}