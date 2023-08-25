<?php
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

<div class="nav">
<a class="active" href="admin.php">Home</a>
    
    <!-- Add a link to insert_users.php -->
    <a href="insert_users.php">Add User</a>

    <div class="login-bar" id="loginBar">
        <a href="index.php" id="loginLink">Logout</a>
    </div>

    <div class="search-bar">
        <form action="searchres.php" method="post">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>
    </div>
</div>
</div>

<div class="mainsection">
    <div class="instructions">
        <div class="welcome">
            <span class="weclome">
                <h2> Welcome [<b> <?php echo($_SESSION["fullName"]); ?> </b>] </h2>
            </span>
        </div>
        <p> <h2> This is Admins Page </h2> </p>
        <p> <h3> Please <span class="imp"> click </span> the wanted paper work to see its procedure </h3></p>
        <p> <h3> You <span class="imp"> modify </span> the users from here </h3></p>
    </div>

    <div class="items">

        <?php
        $conn = mysqli_connect('localhost:3306', 'root', 'root', 'sopDB');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM theprocedure";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $theLink = "showadmin.php?proId=" . $row["procID"];
                ?>
                <a href="<?php echo($theLink) ?>">
                    <div class="block">
                        <img id="book" src="book.jpg" width="50px" height="50px" />
                        <h2 style="display: inline;"><?php echo ($row["procID"]); ?></h2>
                        <p><?php echo ($row["procDescription"]); ?></p>
                    </div>
                </a>
                <?php
            }
        }
        $conn->close();
        ?>
    </div>
</div>

</body>

</html>
