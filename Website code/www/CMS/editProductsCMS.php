<?php
    include('commonCMS.php');
	
    //Navigation
    myHeader("HOT HATS CONTENT MANAGEMENT SYSTEM");
    myNavigation("Homepage", "Add products", "View all products", "Edit products", "Delete products", "View and manage orders");

echo '<br>';

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Selecting a database
$db = $mongoClient->hothats;

//Extracting the product details 
$id = filter_input(INPUT_POST, '_id', FILTER_SANITIZE_STRING);
$name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$size= filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);
$description= filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);

$replaceCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($id)
];

//Constructing PHP array
$productData = [
    "name" => $name,
    "size" => $size,
    "description" => $description,
    "price" => $price,
    "quantity" => $quantity
    
    
];


//Replace product data in the database
$updateRes = $db->Hats->replaceOne($replaceCriteria, $productData);
    
//Echo result back to the user
if($updateRes->getModifiedCount() == 1)
    echo 'Product document successfully replaced.';
else
    echo 'Product replacement error.';
    





    myFooter();
?>



