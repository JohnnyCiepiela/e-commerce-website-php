<?php
    include('commonCMS.php');
	
    //Navigation
    myHeader("HOT HATS CONTENT MANAGEMENT SYSTEM");
    myNavigation("Homepage", "Add products", "View all products", "Edit products", "Delete products", "View and manage orders");

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Establishing connection to database
$mongoClient = (new MongoDB\Client);

//Selecting a database
$db = $mongoClient->hothats;

//Extract ID from POST data
$custID = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

//Build PHP array with delete criteria 
$deleteCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($custID)
];

//Delete the customer document
$deleteRes = $db->Orders->deleteOne($deleteCriteria);
    
//Echo result back to the user
if($deleteRes->getDeletedCount() == 1){
    echo 'Order deleted successfully.';
}
else{
   echo 'Error deleting an order.';
}

?>