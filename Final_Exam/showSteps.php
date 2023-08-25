<?php
session_start();

$conn = mysqli_connect('localhost:3306', 'root', 'root', 'sopDB');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$procId = $_GET["proId"];
$sqlProc = "SELECT procDescription FROM theprocedure WHERE procID = $procId";
$resultProc = $conn->query($sqlProc);

$procedureName = "";
if ($resultProc->num_rows > 0) {
    $rowProc = $resultProc->fetch_assoc();
    $procedureName = $rowProc["procDescription"];
}

$sqlSteps = "SELECT * FROM proceduresteps WHERE procID = $procId";
$resultSteps = $conn->query($sqlSteps);

$conn->close();
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
</div>

<!-- Display procedure name -->
<div class="procedure-name">
    <h2 class = "procname"><?php echo $procedureName; ?></h2>
</div>

<?php
if ($resultSteps->num_rows > 0) {
    ?>
    <table border="1">
        <tr>
            <th> Procedure # </th> 
            <th> Procedures </th>
            <th> Fees (JOD) </th>
        </tr>
        <?php
        while ($row = $resultSteps->fetch_assoc()) {
           echo ("<tr><td>" . $row["stepID"] . "</td><td>" . $row["stepDescription"] . "</td> <td>" . $row["stepFees"] . "</td></tr>");
        }
        ?>
    </table>
    <?php
}
?>
</body>
</html>
