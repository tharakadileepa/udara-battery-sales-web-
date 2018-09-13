<?php

require_once 'business/impl/CustomerBOImpl.php';

header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

$customerBO = new CustomerBOImpl();

switch ($method){
    case "GET":
        $action = $_GET["action"];

        switch($action){
            case "count":
                echo json_encode($customerBO->getCustomersCount());
                break;
            case "all":
                echo json_encode($customerBO->getAllCustomers());
                break;
        }
        break;

    case "POST":

        $action = $_POST["action"];
        $id = $_POST["cusID"];
        $name = $_POST["cusName"];
        $address = $_POST["cusAddress"];
        $contact=$_POST["cusContact"];
        $nic=$_POST["cusNIC"];


        switch($action){
            case "save":
        echo json_encode($customerBO->saveCustomer($id,$name,$address,$contact,$nic));

        break;

            case "update":
                echo json_encode($customerBO->updateCustomer($id,$name,$address,$contact,$nic));
                break;
        }

        break;
    case "DELETE":
        $queryString = $_SERVER["QUERY_STRING"];
        $queryArray = preg_split("/=/",$queryString);
        if (count($queryArray) === 2){
            $id = $queryArray[1];
            echo json_encode($customerBO->deleteCustomer($id));
            break;
        }
    break;
}