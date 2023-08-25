<?php

  session_start();

?>


<?php


if ($_SERVER['REQUEST_METHOD'] === "POST") 
{
    $userID          = $_POST["uname"];
    $userPassword    =  sha1($_POST["psw"]);
 
 
    $conn = mysqli_connect('localhost:3306','root','root','sopDB');
    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }

   $sql = "SELECT * FROM User WHERE stNumber = $userID and stPassWord = '$userPassword'" ;
  
   $result = mysqli_query($conn, $sql);
   
 
   if (mysqli_num_rows($result) > 0) 
   {
     
    while($row = mysqli_fetch_assoc($result))
   { 
     $_SESSION["uID"] = $userID;
     $fullName = $row["stFirstName"] . " " . $row["stSecondName"] . " " . $row["stFamilyName"];
     $_SESSION["fullName"] = $fullName;

    

     header("Location: loginsuccess.php");
     mysqli_close($conn);

     if($row["stFirstName"] == "Admin"){
      header("Location: admin.php");
     }
     
   }
          
  }
  else
  {
   
    header("Location: login.php?m=1");
    
  }

}


?>
<!DOCTYPE html>
<html>
<head>
    <title> Login Page </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="loginbox">

<div class="login-box">
  <h2 class="login-heading">Login Form</h2>
  <form action="login.php" method="POST">
    <div class="container">
      <label for="uname"><b>ID:</b></label>
      <input type="number" placeholder="Enter ID" name="uname" required />
      <label for="psw"><b>Password:</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required />
      <input type="submit" value="Login" />

      <?php
      if ($_SERVER['REQUEST_METHOD'] === "GET" && $_GET["m"] == 1)
      {
        ?>

        <span><br/><b style='color:red;'>Incorrect Username or Passwword !!</b> </span>

      <?php
      }
    ?>

    </div>

    </form>
</div>
    </div>

   
    


</body>
</html>
