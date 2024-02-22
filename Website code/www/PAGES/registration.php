<?php
    //Extracting and filtering the data from the input fields
    $name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    if($name != "" && $email != "" && $password != ""){
       
    
        //Output message confirming registration
        echo 'Thank you for registering on our page ' . $name . '!';
    }
    else{
        echo 'Registration data missing';
    }

