<?php

require_once  'business/impl/OrderBOImpl.php';

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$orderBO = new OrderBOImpl();

switch ($method) {
    case "POST":

        $action = $_POST["action"];
        $cusid=$_POST["cusID"];
        $ordid=$_POST["ordID"];
        $orddate=$_POST["ordDate"];
        $bcode=$_POST["batCode"];
        $bprice=$_POST["batPrice"];


        switch ($action) {
            case "save":
                echo json_encode($orderBO->saveItem($cusid, $ordid, $orddate,$bcode,$bprice));
                break;

        }

    case "GET":

        $action = $_GET["action"];

        switch ($action) {

            case "count":
                echo json_encode($orderBO->getItemsCount());
                break;
        }


}