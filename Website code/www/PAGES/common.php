<?php

//Function for the heading part of the pages.

function myHeader($title){
	
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<title>' . $title . '</title>';
    echo '<link rel="stylesheet" type="text/css" href="../CSS/website_styles.css">';
    echo '</head>';
    echo '<body>';
}

?>

<h1 id="page_name"> HOT HATS </h1>

<?php

//Function for the navigation bar.

function myNavigation($namePage){
    
    echo '<div class="navigation">';
	
    
//We link the page names to the corresponding files.	
	
    $navPages = array("Homepage ", "Register/Login ");
    $navFiles = array("index.php", "registerpage.php");
	
    for($i = 0; $i < count($navPages); $i++){
        echo '<a ';
        if($navPages[$i] == $namePage){
            echo 'class="selected" ';
        }
        echo 'href="' . $navFiles[$i] . '">' . $navPages[$i] . '</a>';
    }
	
		echo '<div class="topnav">';
  
		echo '<input type="text" placeholder="Search the product...">';
  
		echo '</div>';
	
    echo '</div>';
}

?>


<?php
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