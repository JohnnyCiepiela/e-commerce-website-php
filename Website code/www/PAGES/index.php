<?php
    include('common.php');
	
    //Navigation
    myHeader("Homepage");
    myNavigation("Homepage ", "Register/Login ");
?>

<script src="basket.js"></script>

<img id= "hats" src="../IMAGES/HATS/santa.png" alt="santa" >
<img id= "hats" src="../IMAGES/HATS/explorer.png" alt="explorer" >
<img id= "hats" src="../IMAGES/HATS/magician.png" alt="magician" >

<?php

//Establishing connection to the database
require __DIR__ . '/vendor/autoload.php';
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->hothats;

$products = $db->Hats->find();


echo '<div style="text-align:center;">';

echo '<table style="border:1px solid black;margin-left:auto;margin-right:auto;">';
echo '<tr><th>Name</th><th>Size</th><th>Description</th><th>Price</th><th>Quantity</th></tr>';
foreach ($products as $document) {
	echo '<tr>';
	echo '<td>' . $document["name"] . '</td>';
	echo '<td>' . $document["size"] . '</td>';
	echo '<td>' . $document["description"] . '</td> ';
	echo '<td>' . $document["price"] . '</td>';
	echo '<td>' . $document["quantity"] . '</td>';
	echo '<td><button onclick=\'addToBasket("' . $document["_id"] . '","' . $document["name"] . '")\'>';
	echo '<img class="addButtonImg" src="../IMAGES/shopping_cart.png"></button></td>';
	echo '</tr>';
	
}
echo '</table>';
echo '</div>';

?>

<h2> Basket </h2>
<div id="basketDiv"> </div>


<?php
    myFooter();
?>