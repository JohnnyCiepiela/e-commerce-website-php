<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Selecting a database
$db = $mongoClient->hothats;

//Selecting a collection 
$collection = $db->Customers;

//Extracting the data that was sent to the server
$name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//Conversion to PHP array
$dataArray = [
    "name" => $name, 
    "email" => $email, 
    "password" => $password
 ];

//Add the new customer to the database
$insertResult = $collection->insertOne($dataArray);
    
//Echo result back to the user
if($insertResult->getInsertedCount()==1){
    echo 'Customer added.';
}
else {
    echo 'Error adding customer';
}






