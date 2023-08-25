<?php
session_start();

$conn = mysqli_connect('localhost:3306', 'root', 'root', 'sopDB');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    
    $sql = "SELECT theprocedure.procID as a, proceduresteps.stepID as b, theprocedure.procDescription as c, proceduresteps.stepDescription as d
        FROM theprocedure
        INNER JOIN proceduresteps ON theprocedure.procID = proceduresteps.procID
        WHERE proceduresteps.stepDescription LIKE '%$searchTerm%' OR theprocedure.procDescription like '%$searchTerm%'"  ;

    $result = $conn->query($sql);
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Search Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="nav">
        <a class="active" href="loginsuccess.php">Home</a>
        <div class="login-bar" id="loginBar">
            <a href="index.php" id="loginLink">Logout</a>
        </div>

        <div class="search-bar">
            <form action="searchres.php" method = "post">
                <input type="text" placeholder="Search.." name="search" required />
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="mainsection">
            <?php
            if (isset($result) && $result->num_rows > 0) 
            {

                ?>
        <table>
        <tr id="hrow"><th>Procedure No</th><th>Step ID</th><th>Procedure Name</th> <th>Step Description</th></tr>
                <?php
                
                while ($row = $result->fetch_assoc()) {

                  $newProcDesc = preg_replace("/\p{L}*?".preg_quote($searchTerm)."\p{L}*/ui", "<mark>$0</mark>", $row['c']);   
                   $newStepDesc =  preg_replace("/\p{L}*?".preg_quote($searchTerm)."\p{L}*/ui", "<mark>$0</mark>", $row['d']);   
                    echo '<tr>';
                    echo '<td>' . $row['a'] . '</td>';
                    echo '<td>' . $row['b'] . '</td>';
                    echo '<td>' . $newProcDesc . '</td>';
                    echo '<td>' . $newStepDesc . '</td>';
                    echo '</tr>';
                }
                ?>
                </table>

                <?php

            } else {
                ?>

               
        </div>

        <div>
        <p>No results found dfergtedrt.</p>

<?php
}
?>
            </div>

    </body>
</html>
