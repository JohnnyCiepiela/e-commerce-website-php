<?php
    include('common.php');
	
    // navigation
    myHeader("Registration/Login");
    myNavigation("Homepage ", "Shopping basket ", "Register/Login ");
?>

    
<!-- Input fields for user details -->	
<h1> Register on our page </h1>
<form action="registration.php" method="post">
  <p>Name:</p>
  <input type="text" id="name" name="name" required/> <br>
  
  <p>E-mail:</p>
  <input type="text" id="email" name="email" required/><br>

  <p>Password:</p>
  <input type="text" id="password" name="password" required/><br>

	<button onclick="register()">Register</button>
	
		<p>
            Server response: <span id="ServerResponse"></span>
        </p>
</form> 

<script>

		//Function responsible for registering the user
            function register(){
                //Creating request object 
                let request = new XMLHttpRequest();

                
                request.onload = () => {
                    
                    if(request.status === 200){
                        //Extracting data from server
                        let responseData = request.responseText;

                        //Add data to page
                        document.getElementById("ServerResponse").innerHTML = responseData;
                    }
                    else
                        alert("Error communicating with server: " + request.status);
                };

                //Setting up request with HTTP method and URL 
                request.open("POST", "registration.php");
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                
                //Extract registration data
                let usrName = document.getElementById("name").value;
                let usrEmail = document.getElementById("email").value;
                let usrPassword = document.getElementById("password").value;
                
                //Send request
                request.send("name=" + usrName + "&email=" + usrEmail + "&password=" + usrPassword);
            }
        </script>



<h1> Already have an account? Log in! </h1>
	
<form action="userlogin.php" method="post">
  
  <p>E-mail:</p>
  <input type="text" id="email" name="email" required/><br>

  <p>Password:</p>
  <input type="text" id="password" name="password" required/><br>

 
  <input type="submit" value="Login">
</form> 




<?php
    myFooter();
?>