<?php
/**
 * Created by IntelliJ IDEA.
 * User: THARAKA
 * Date: 7/29/2018
 * Time: 9:43 PM
 */

interface OrderBO{

    public function getItemsCount();

    public function saveItem($cusid, $ordid, $orddate,$bcode,$bprice);


}