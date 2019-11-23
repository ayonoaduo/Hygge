<?php
	$validate = true;
	$error = "";
	$reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
	$reg_username = "/^[a-zA-Z0-9_-]+$/";
	$reg_Pswd = "/^(\S*)?\d+(\S*)?$/";
	$reg_Retypepswd = "/^(\S*)?\d+(\S*)?$/";
	$email = "";


	if (isset($_POST["submitted"]) && $_POST["submitted"])
	{
	    $email = trim($_POST["email"]);
	    $username = trim($_POST["uname"]);
	    $password = trim($_POST["psw"]);
	    $confirm_password = trim($_POST["psw_repeat"]);
	     
	    $db = new mysqli("localhost", "ayonoado", "Friday9", "ayonoado");
	    if ($db->connect_error)
	    {
			die ("Connection failed: " . $db->connect_error);
	    }
	    
	    $q1 = "SELECT * FROM Hygge WHERE email = '$email'";
	    $r1 = $db->query($q1);

	    
	    if($r1->num_rows > 0)
	    {
			$validate = false;
	    }
	    else
	    {
			$emailMatch = preg_match($reg_Email, $email);
			if($email == null || $email == "" || $emailMatch == false)
			{
				$validate = false;
			}
			
			$usernameMatch = preg_match($reg_username, $username);
		 	if ($username==null || $username=="" ||$usernameMatch == false)
		 	{ 
	 	
				$validate = false;
		 	}

				  
			$pswdLen = strlen($password);
			$pswdMatch = preg_match($reg_Pswd, $password);
			if($password == null || $password == "" || $pswdLen< 8 || $pswdMatch == false)
			{
				$validate = false;
			}

	    }

	    if($validate == true)
	    {
			
			//add code here to insert a record into the table User;
			// table User attributes are: email, password, DOB
			// variables in the form are: email, password, dateFormat, 
			// start with $q2 =
			
			$q2="INSERT INTO Hygge(email, username, password, retype_pswd) VALUES('$email', $username, '$password', '$confirm_password' )";
			$r2 = $db->query($q2);
			
			if ($r2 === true)
			{
				header("Location: main.html");
				$db->close();
				exit();
			}
	    }
	    else
	    {
			$error = "Email address is not available. Signup failed.";
			$db->close();
	    }

	}
?>
<!DOCTYPE html>
<html class="signup_back">

  <head>
    <title>Sign Up</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href='https://fonts.googleapis.com/css?family=Economica' rel='stylesheet'><!--Added to gain access to Economica font -->
    <link rel="stylesheet" href="signuppage.css">
    <script type="text/javascript" src="validate_signup.js"></script>
  </head>

  <body>

    <div class="content2">
      <h2>Signup Form</h2>

      <form id="SignUp" onsubmit="return SignUpForm()" method="post">

        <input type="text" placeholder="Enter Email" name="email" required>
        <input type="text" placeholder="Enter Username" name="uname" required>
        <input type="password" placeholder="Enter Password" name="psw" required>
        <input type="password" placeholder="Retype Password" name="psw_repeat" required>
        <input type="submit" class="registerbtn" value="SignUp"></input>

      </form>

      <h3><a href="main.html">Go Back</a></h3>
    </div>

  </body>

</html>
