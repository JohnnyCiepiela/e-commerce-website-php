<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Selecting a database
$db = $mongoClient->hothats;

//Extracting ID from POST data
$custID = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

//Building PHP array with delete criteria 
$deleteCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($custID)
];

//Delete the customer document
$deleteRes = $db->Customers->deleteOne($deleteCriteria);
    
//Echo result back to the user
if($deleteRes->getDeletedCount() == 1){
    echo 'Customer deleted successfully.';
}
else{
   echo 'Error deleting customer';
}

?>