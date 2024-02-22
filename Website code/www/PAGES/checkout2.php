<?php
    include('common.php');
	
    //Navigation
    myHeader("Homepage");
    myNavigation("Homepage ", "Register/Login ");

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Selecting a database
$db = $mongoClient->hothats;

//Selecting a collection 
$collection = $db->Orders;

//Extracting the data that was sent to the server
$name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);

//Conversion to PHP array
$dataArray = [
    "name" => $name, 
    "surname" => $surname, 
    "address" => $address
 ];

//Add the new order to the database
$insertResult = $collection->insertOne($dataArray);
    
//Echo result back to thr user
if($insertResult->getInsertedCount()==1){
    echo 'Order has been placed.';
}
else {
    echo 'Error adding order.';
}

?>




