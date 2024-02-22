<?php

//Function responsible for displaying the header for websites along with beggining parts of the body
function myHeader($title){
	
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<title>' . $title . '</title>';
    echo '<style>';
    echo 'table, th, td {
        border:1px solid black;
      }';
    echo '</style>';
    echo '</head>';
    echo '<body>';
    
    echo '<p1> HOT HATS CONTENT MANAGEMENT SYSTEM </p1>';
	
	
}


//Function responsible for displaying the navigation bar
function myNavigation($namePage){
  
    
    echo '<div class="navigation">';
    
    //We link the page names to the corresponding files.
    $navPages = array("Homepage", "Add products", "View all products", "Edit products", "Delete products", "View and manage orders", "Customers management");
    $navFiles = array("indexCMS.php", "addProductsCMS.html", "viewProductsCMS.php", "editProductsCMS.html", "deleteProductsCMS.html", "viewOrdersCMS.php", "customersCMS.php");
    
   
    for($i = 0; $i < count($navPages); $i++){
        echo '<li><a ';
        if($navPages[$i] == $namePage){
            echo 'class="selected" ';
        }
        echo 'href="' . $navFiles[$i] . '">' . $navPages[$i] . '</a></li>';
    }
    echo '</div>';
}

function customersManagement($namePage){
  
    
    echo '<div class="navigation">';
    
    //We link the page names to the corresponding files.
    $navPages = array("Add customer", "Delete customer", "Find customer", "Replace customer");
    $navFiles = array("addCustomer.html", "deleteCustomer.html", "findCustomer.html", "replaceCustomer.html");
    
   
    for($i = 0; $i < count($navPages); $i++){
        echo '<li><a ';
        if($navPages[$i] == $namePage){
            echo 'class="selected" ';
        }
        echo 'href="' . $navFiles[$i] . '">' . $navPages[$i] . '</a></li>';
    }
    echo '</div>';
}



//Function responsible for displaying the footer
function myFooter(){

    echo '<footer class="footer-distributed">';
	
    echo '<div class="footer-right">';
	
    echo '</div>';
	
    echo '<div class="footer-left">';
	
    echo '<p class="footer-links">';
	
    echo '</div>';
	
    echo '</footer>';
}

?>
