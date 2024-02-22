<?php
    include('commonCMS.php');
	
    //Navigation
    myHeader("HOT HATS CONTENT MANAGEMENT SYSTEM");
    myNavigation("Homepage", "Add products", "View all products", "Edit products", "Delete products", "View and manage orders");

echo '<br>';

//Establishing connection to the database
require __DIR__ . '/vendor/autoload.php';
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->hothats;

$orders = $db->Orders->find();

//Printing all the order documents from the database
echo '<div style="text-align:center;">';

echo '<table style="border:1px solid black;margin-left:auto;margin-right:auto;">';
echo '<tr><th>Order ID</th><th>Name</th><th>Surname</th><th>Address</th></tr>';
foreach ($orders as $document) {
	echo '<tr>';
	echo '<td>' . $document["_id"] . '</td>';
	echo '<td>' . $document["name"] . '</td>';
	echo '<td>' . $document["surname"] . '</td>';
	echo '<td>' . $document["address"] . '</td> ';
	echo '</tr>';
	
}
echo '</table>';
echo '</div>';

?>

<!-- Form for entering details of the order to be deleted -->
<h3> Enter the ID of an order that you want to delete: </h3>

<form action="deleteOrdersCMS.php" method="post">

  <input type="text" id="id" name="id" required> <br>
	<br>
  <input type="submit" value="DELETE">

</form> 