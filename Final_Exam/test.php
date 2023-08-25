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
        <a class="active" href="loginsuccess.php">Home</a>
        <a href="contact_me.php">Contact Me</a>
        <a href="about.php">About</a>
        <div class="login-bar" id="loginBar">
            <span> Welcome [<b> <?php echo($_SESSION["fullName"]); ?> </b>] </span>
            <a href="index.php" id="loginLink">Logout</a>
        </div>

        <div class="search-bar">
            <form action="javascript:void(0);" onsubmit="search()">
                <input type="text" id="searchQuery" placeholder="Search...">
                <input type="submit" value="Search">
            </form>
        </div>

    </div>

</body>

<?php

$conn = mysqli_connect('localhost','root','root','sopDB');
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM 	proceduresteps WHERE procID = " . $_GET["proId"];
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{

  ?>
  
  <table border="1" width="80%">
     <tr> <th> Step # </th> <th> Step Description </th> <th> Fees (JOD)</th><tr>


 <?php

while($row = $result->fetch_assoc())
{
  echo("<tr><td>".$row["stepID"]. "</td><td>" . $row["stepDescription"] . "</td> <td>" . $row ["stepFees"] . "</td></tr>");

}

}

$conn -> close();

?>
</table>