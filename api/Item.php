<?php

require_once  'business/impl/ItemBOImpl.php';

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$itemBO = new ItemBOImpl();

switch ($method) {
    case "GET":

        $action = $_GET["action"];

        switch ($action) {
            case "count":
                echo json_encode($itemBO->getItemsCount());
            break;

            case "all":
                echo json_encode($itemBO->getAllItems());
                break;
        }
        break;

    case "POST":
        $action = $_POST["action"];
        $bcode = $_POST["battCode"];
        $btype = $_POST["battType"];
        $bcategory = $_POST["battCategory"];



        switch ($action) {
            case "save":
                echo json_encode($itemBO->saveItem($bcode,$btype,$bcategory));
                break;
        }
        break;

    case "DELETE":
        $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/=/", $queryString);
        if (count($queryArray) === 2) {
            $id = $queryArray[1];
            echo json_encode($itemBO->deleteItem($bcode));
            break;
        }
        break;
}