<?php

//Extract the product IDs that were sent to the server
$prodIDs= $_POST['prodIDs'];

//Convert JSON string to PHP array 
$productArray = json_decode($prodIDs, true);

//Output the IDs of the products that the customer has ordered
echo '<h1>Products Sent to Server</h1>';
for($i=0; $i<count($productArray); $i++){
    echo '<p>Product ID: ' . $productArray[$i]['id'] . '. Count: ' . $productArray[$i]['count'] . '</p>';
}

?>

<!-- Form for customer confirmation of order -->
<h2> Enter your details: </h2>

<form action="checkout2.php" method="post">
  <p>Name:</p>
  <input type="text" id="name" name="name" required> <br>
  
  <p>Surname:</p>
  <input type="text" id="surname" name="surname" required><br>

  <p>Address:</p>
  <input type="text" id="address" name="address" required><br>

  <input type="submit" value="CONFIRM">
</form> 
