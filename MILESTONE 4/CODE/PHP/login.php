<?php

$validate = true;
$reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
$reg_Pswd = "/^(\S*)?\d+(\S*)?$/";

$email = "";
$error = "";

if (isset($_POST["submitted"]) && $_POST["submitted"])
{
    $email = trim($_POST["email"]);
    $password = trim($_POST["psw"]);
    
    $db = new mysqli("localhost", "ayonoado", "Friday9", "ayonoado");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }

    $q = "SELECT * FROM  Hygge WHERE email = '$email' AND password = '$password'";
       
    $r = $db->query($q);
    $row = $r->fetch_assoc();
    if($email != $row["email"] && $password != $row["password"])
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
        
        $pswdLen = strlen($password);
        $passwordMatch = preg_match($reg_Pswd, $password);
        if($password == null || $password == "" || $pswdLen < 8 || $passwordMatch == false)
        {
            $validate = false;
        }
    }
    
    if($validate == true)
    {

        session_start();
        $_SESSION["email"] = $row["email"];
        header("Location: loggedin.html");
        $db->close();
        exit();
    }
    else 
    {
        $error = "The email/password combination was incorrect. Login failed.";
        $db->close();
    }
}

?>




<!DOCTYPE html>
<html class="login_back">

  <head>
    <title>Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href='https://fonts.googleapis.com/css?family=Economica' rel='stylesheet'>
    <link rel="stylesheet" href="Loginpage.css">
    <script type="text/javascript" src="validate_login.js"></script>
  </head>

  <body>

    <div class="content2">
      <h2>Welcome Back</h2>

      <form id="Login" action="login.php" method="post">
		<input type="hidden" name="submitted" value="1"/>
        <input type="text" placeholder="Enter Email" id = "email" name="email" required>
        <input type="password" placeholder="Enter Password" name="psw" id ="psw" required>
        <input type="submit" class="registerbtn" value="Login"></input>
	


      </form>
	  </br></br>
	  <h3><a href="main.html">Go back</a></h3>
    </div>

  </body>

</html>





