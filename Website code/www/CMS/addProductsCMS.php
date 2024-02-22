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

	//Selecting a collection 
	$collection = $db->Hats;


//Extracting the data from the form
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);

//Conversion to PHP array
$dataArray = [
    "name" => $name, 
	"size" => $size,
    "description" => $description, 
    "price" => $price,
    "quantity" => $quantity

 ];

//Adding the new product to the database
$returnVal = $collection->insertOne($dataArray);
    
//Echo result back to the user
if($returnVal->getInsertedCount()==1){
    echo 'Product successfully added to the database.';
}
else {
    echo 'Error adding product.';
}
    myFooter();
?>



