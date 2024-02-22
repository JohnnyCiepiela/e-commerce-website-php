<?php
    include('commonCMS.php');
	
    //Navigation
    myHeader("HOT HATS CONTENT MANAGEMENT SYSTEM");
    myNavigation("Homepage", "Add products", "View all products", "Edit products", "Delete products", "View and manage orders");
?>

<table>
           
        <thead>
                <tr>
                    
                    <th>ID</th>
                    <th>Name</th>
                    <th>Size</th>
					<th>Description</th>
					<th>Price</th>
					<th>Quantity</th>
                    
                </tr>
        </thead>
        <tbody>
			
                <?php

             require __DIR__ . '/vendor/autoload.php';
			$mongoClient = (new MongoDB\Client);

             //Selecting a database
             $db = $mongoClient->hothats;

             $collection = $db->Hats->find();
			 

			 //Loop that prints out the products along with details and writes them into the body of the table
                foreach ($collection as $document){
                     echo 
                        "<tr>
                            
                            <td>" . $document['_id'] . "</td>
							<td>" . $document['name'] . "</td>
							<td>" . $document['size'] . "</td>
                            <td>" . $document['description'] . "</td>
                            <td>" . $document["price"] . "</td>
                            <td>" . $document['quantity'] . "</td>
                           
                        </tr>";
                        echo '</tbody>';
                         }
             
            
             ?>
        </table>


<?php
    myFooter();
?>


