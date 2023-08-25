<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>SOPs Website for TTU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php

   $_SESSION["isLogin"] = false;
   $_SESSION["fullName"] = "";

?>


    <div class="nav">
        <a class="active" href="index.php">Home</a>
        <div class="login-bar" id="loginBar">
            <a href="login.php" id="loginLink">Login</a>
        </div>

        <div class="search-bar">
        <form method = "post" >
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
        </div>

    </div>


<div class="mainsection">
    <div class="introduction"> 
    <h1> Welcome to my <span class="imp"> SOPs</span> website. <h1>

    <p>We understand that navigating university paperwork can be challenging. Our SOPs website is designed to
                provide you with clear and concise instructions for various routine tasks, such as enrollment,
                financial aid, and more. Our goal is to empower you with the knowledge you need to succeed.</p>

    <p> Please <span class="imp"> Login </span> now to access our Content and to be able to use the <span class="imp"> search bar </span> </p>
                
</div>
</div>

</body>

</html>
