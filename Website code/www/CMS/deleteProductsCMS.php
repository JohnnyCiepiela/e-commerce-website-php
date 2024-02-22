<?php
    include('commonCMS.php');
	
    //Navigation
    myHeader("HOT HATS CONTENT MANAGEMENT SYSTEM");
    myNavigation("Homepage", "Add products", "View all products", "Edit products", "Delete products", "View and manage orders");
	
	echo '<br>';

//Establishing connection to database
require __DIR__ . '/vendor/autoload.php';
$mongoClient = (new MongoDB\Client);

//Selecting a database
$db = $mongoClient->hothats;

//Extract ID from POST data
$custID = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_STRING);

//Build PHP array with remove criteria 
$remCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($custID)
];

//Delete the product document
$returnVal = $db->Hats->deleteOne($remCriteria);
    
//Echo result back to the user
if($returnVal->getDeletedCount()==1){
    echo 'Product successfully deleted.';
}
else{
   echo 'Error deleting product.';
}

//Close the connection





    myFooter();
?>



